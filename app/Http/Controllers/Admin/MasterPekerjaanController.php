<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMasterPekerjaanRequest;
use App\Http\Requests\StoreMasterPekerjaanRequest;
use App\Http\Requests\UpdateMasterPekerjaanRequest;
use App\Master_Pekerjaan;

class MasterPekerjaanController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('master_pekerjaan_access'), 403);

        $master_pekerjaan = Master_Pekerjaan::all();

        return view('admin.master_pekerjaan.index', compact('master_pekerjaan'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('master_pekerjaan_create'), 403);

        return view('admin.master_pekerjaan.create');
    }

    public function store(StoreMasterPekerjaanRequest $request)
    {
        abort_unless(\Gate::allows('master_pekerjaan_create'), 403);

        $master_agama = Master_Pekerjaan::create($request->all());

        return redirect()->route('admin.master_pekerjaan.index');
    }

    public function edit(master_pekerjaan $master_pekerjaan)
    {
        abort_unless(\Gate::allows('master_pekerjaan_edit'), 403);

        return view('admin.master_pekerjaan.edit', compact('master_pekerjaan'));
    }

    public function update(UpdateMasterPekerjaanRequest $request, master_pekerjaan $master_pekerjaan)
    {
        abort_unless(\Gate::allows('master_pekerjaan_edit'), 403);

        $master_pekerjaan->update($request->all());

        return redirect()->route('admin.master_pekerjaan.index');
    }

    public function show(master_pekerjaan $master_pekerjaan)
    {
        abort_unless(\Gate::allows('master_pekerjaan_show'), 403);

        return view('admin.master_pekerjaan.show', compact('master_pekerjaan'));
    }

    public function destroy(master_pekerjaan $master_pekerjaan)
    {
        abort_unless(\Gate::allows('master_pekerjaan_delete'), 403);

        $master_pekerjaan->delete();

        return back();
    }

    public function massDestroy(MassDestroyMasterPekerjaanRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
