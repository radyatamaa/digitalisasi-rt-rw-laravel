<?php

namespace App\Http\Controllers\Admin;

use App\Kelurahan;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRwRequest;
use App\Http\Requests\StoreRwRequest;
use App\Http\Requests\UpdateRwRequest;
use App\Rw;

class RwController extends Controller
{
    public function index()
    {

        abort_unless(\Gate::allows('rw_access'), 403);
        $rw = Rw::all();

        return view('admin.rw.index', compact('rw'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('rw_create'), 403);

        $rw_kel_id = Kelurahan::all()->pluck('kel_name', 'id');

        return view('admin.rw.create', compact('rw_kel_id'));
    }


    public function store(StoreRwRequest $request)
    {
        abort_unless(\Gate::allows('rw_create'), 403);

        $rt = Rw::create($request->all());

        return redirect()->route('admin.rw.index');
    }

    public function edit(rw $rw)
    {
        abort_unless(\Gate::allows('rw_edit'), 403);

        $rw_kel_id = Kelurahan::all()->pluck('kel_name', 'id');

        return view('admin.rw.edit', compact('rw', 'rw_kel_id'));
    }


    public function update(UpdateRwRequest $request, rw $rw)
    {

        abort_unless(\Gate::allows('rw_edit'), 403);

        $rw->update($request->all());

        return redirect()->route('admin.rw.index');
    }

    public function show(rw $rw)
    {
        abort_unless(\Gate::allows('rw_show'), 403);

        return view('admin.rw.show', compact('rw'));
    }

    public function destroy(rw $rw)
    {
        abort_unless(\Gate::allows('rw_delete'), 403);

        $rw->delete();

        return back();
    }

    public function massDestroy(MassDestroyRwRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
