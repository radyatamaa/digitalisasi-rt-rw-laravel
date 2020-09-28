<?php

namespace App\Http\Controllers\Admin;

use App\History_Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHistoryWargaRequest;
use App\Http\Requests\StoreHistoryWargaRequest;
use App\Http\Requests\UpdateHistoryWargaRequest;
use App\History_Warga;


class HistoryWargaController extends Controller
{
    public function index()
    {

        abort_unless(\Gate::allows('history_warga_access'), 403);
        $history_warga = History_Warga::all();

        return view('admin.history_warga.index', compact('history_warga'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('history_warga_create'), 403);

        $history_category = History_Category::all()->pluck('category_name', 'id');

        return view('admin.history_warga.create', compact('history_warga', 'history_category'));
    }

    public function store(StoreHistoryWargaRequest $request)
    {
        abort_unless(\Gate::allows('history_warga_create'), 403);

        $history_warga = History_Warga::create($request->all());

        return redirect()->route('admin.history_warga.index');
    }

    public function edit(History_Warga $history_warga)
    {
        abort_unless(\Gate::allows('history_warga_edit'), 403);

        $history_category = History_Category::all()->pluck('category_name', 'id');

        return view('admin.history_warga.edit', compact('history_warga', 'history_category'));
    }

    public function update(UpdateHistoryWargaRequest $request, History_Warga $history_warga)
    {

        abort_unless(\Gate::allows('history_warga_edit'), 403);

        $history_warga->update($request->all());

        return redirect()->route('admin.history_warga.index');
    }

    public function show(History_Warga $history_warga)
    {
        abort_unless(\Gate::allows('history_warga_show'), 403);

        return view('admin.history_warga.show', compact('history_warga'));
    }

    public function destroy(History_Warga $history_warga)
    {
        abort_unless(\Gate::allows('history_warga_delete'), 403);

        $history_warga->delete();

        return back();
    }

    public function massDestroy(MassDestroyHistoryWargaRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
