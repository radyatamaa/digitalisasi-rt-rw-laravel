<?php

namespace App\Http\Controllers\Admin;

use App\Rw;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRtRequest;
use App\Http\Requests\StoreRtRequest;
use App\Http\Requests\UpdateRtRequest;
use App\Rt;

class RtController extends Controller
{
    public function index()
    {

        abort_unless(\Gate::allows('rt_access'), 403);
        $rt = Rt::all();

        return view('admin.rt.index', compact('rt'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('rt_create'), 403);

        $rt_rw_id = Rw::all()->pluck('rw_name', 'id');

        return view('admin.rt.create', compact('rt', 'rt_rw_id'));
    }


    public function store(StoreRtRequest $request)
    {
        abort_unless(\Gate::allows('rt_create'), 403);

        $rt = Rt::create($request->all());

        return redirect()->route('admin.rt.index');
    }

    public function edit(rt $rt)
    {
        abort_unless(\Gate::allows('rt_edit'), 403);

        $rt_rw_id = Rw::all()->pluck('rw_name', 'id');

        return view('admin.rt.edit', compact('rt', 'rt_rw_id'));
    }

    public function update(UpdateRtRequest $request, rt $rt)
    {

        abort_unless(\Gate::allows('rt_edit'), 403);

        $rt->update($request->all());

        return redirect()->route('admin.rt.index');
    }

    public function show(rt $rt)
    {
        abort_unless(\Gate::allows('rt_show'), 403);

        return view('admin.rt.show', compact('rt'));
    }

    public function destroy(rt $rt)
    {
        abort_unless(\Gate::allows('rt_delete'), 403);

        $rt->delete();

        return back();
    }

    public function massDestroy(MassDestroyRtRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
