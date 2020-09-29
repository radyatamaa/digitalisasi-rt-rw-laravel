<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInsidentalRequest;
use App\Http\Requests\StoreInsidentalRequest;
use App\Http\Requests\UpdateInsidentalRequest;
use App\Insidental;
use App\Insidental_Category;

class InsidentalController extends Controller
{
    public function index()
    {

        abort_unless(\Gate::allows('insidental_access'), 403);
        $insidental = Insidental::all();

        return view('admin.insidental.index', compact('insidental'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('insidental_create'), 403);

        $ins_category = Insidental_Category::all()->pluck('category_name', 'id');

        return view('admin.insidental.create', compact('ins_category'));
    }

    public function store(StoreInsidentalRequest $request)
    {
        abort_unless(\Gate::allows('insidental_create'), 403);

        $insidental = Insidental::create($request->all());

        return redirect()->route('admin.insidental.index');
    }

    public function edit(Insidental $insidental)
    {
        abort_unless(\Gate::allows('insidental_edit'), 403);

        $ins_category = Insidental_Category::all()->pluck('category_name', 'id');

        return view('admin.insidental.edit', compact('insidental', 'ins_category'));
    }

    public function update(UpdateInsidentalRequest $request, Insidental $insidental)
    {

        abort_unless(\Gate::allows('insidental_edit'), 403);

        $insidental->update($request->all());

        return redirect()->route('admin.insidental.index');
    }

    public function show(Insidental $insidental)
    {
        abort_unless(\Gate::allows('insidental_show'), 403);

        return view('admin.insidental.show', compact('insidental'));
    }

    public function destroy(Insidental $insidental)
    {
        abort_unless(\Gate::allows('insidental_delete'), 403);

        $insidental->delete();

        return back();
    }

    public function massDestroy(MassDestroyInsidentalRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
