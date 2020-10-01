<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWilayahRequest;
use App\Http\Requests\StoreWilayahRequest;
use App\Http\Requests\UpdateWilayahRequest;
use App\Wilayah;

class WilayahController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('wilayah_access'), 403);

        $wilayah = Wilayah::all();

        return view('admin.wilayah.index', compact('wilayah'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('wilayah_create'), 403);

        return view('admin.wilayah.create');
    }

    public function store(StoreWilayahRequest $request)
    {
        abort_unless(\Gate::allows('wilayah_create'), 403);

        $wilayah = Wilayah::create($request->all());

        return redirect()->route('admin.wilayah.index');
    }

    public function edit(wilayah $wilayah)
    {
        abort_unless(\Gate::allows('wilayah_edit'), 403);

        return view('admin.wilayah.edit', compact('wilayah'));
    }

    public function update(UpdateWilayahRequest $request, wilayah $wilayah)
    {
        echo "kontol";
        abort_unless(\Gate::allows('wilayah_edit'), 403);

        $wilayah->update($request->all());

        return redirect()->route('admin.wilayah.index');
    }

    public function show(wilayah $wilayah)
    {
        abort_unless(\Gate::allows('wilayah_show'), 403);

        return view('admin.wilayah.show', compact('wilayah'));
    }

    public function destroy(wilayah $wilayah)
    {
        abort_unless(\Gate::allows('wilayah_delete'), 403);

        $wilayah->delete();

        return back();
    }

    public function massDestroy(MassDestroyWilayahRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
