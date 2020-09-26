<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMasterAlamatRequest;
use App\Http\Requests\StoreMasterAlamatRequest;
use App\Http\Requests\UpdateMasterAlamatRequest;
use App\master_alamat;

class MasterAlamatController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('master_alamat_access'), 403);

        $master_alamat = Master_Alamat::all();

        return view('admin.master_alamat.index', compact('master_alamat'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('master_alamat_create'), 403);

        return view('admin.master_alamat.create');
    }

    public function store(StoreMasterAlamatRequest $request)
    {
        abort_unless(\Gate::allows('master_alamat_create'), 403);

        $master_alamat = Master_Alamat::create($request->all());

        return redirect()->route('admin.master_alamat.index');
    }

    public function edit(master_alamat $master_alamat)
    {
        abort_unless(\Gate::allows('master_alamat_edit'), 403);

        return view('admin.master_alamat.edit', compact('master_alamat'));
    }

    public function update(UpdateMasterAlamatRequest $request, master_alamat $master_alamat)
    {
        abort_unless(\Gate::allows('master_alamat_edit'), 403);

        $master_alamat->update($request->all());

        return redirect()->route('admin.master_alamat.index');
    }

    public function show(master_alamat $master_alamat)
    {
        abort_unless(\Gate::allows('master_alamat_show'), 403);

        return view('admin.master_alamat.show', compact('master_alamat'));
    }

    public function destroy(master_alamat $master_alamat)
    {
        abort_unless(\Gate::allows('master_alamat_delete'), 403);

        $master_alamat->delete();

        return back();
    }

    public function massDestroy(MassDestroyMasterAlamatRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
