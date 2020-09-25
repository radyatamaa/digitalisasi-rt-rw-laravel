<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMasterAgamaRequest;
use App\Http\Requests\StoreMasterAgamaRequest;
use App\Http\Requests\UpdateMasterAgamaRequest;
use App\master_agama;

class MasterAgamaController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('master_agama_access'), 403);

        $master_agama = Master_Agama::all();

        return view('admin.master_agama.index', compact('master_agama'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('master_agama_create'), 403);

        return view('admin.master_agama.create');
    }

    public function store(StoreMasterAgamaRequest $request)
    {
        abort_unless(\Gate::allows('master_agama_create'), 403);

        $master_agama = Master_Agama::create($request->all());

        return redirect()->route('admin.master_agama.index');
    }

    public function edit(master_agama $master_agama)
    {
        abort_unless(\Gate::allows('master_agama_edit'), 403);

        return view('admin.master_agama.edit', compact('master_agama'));
    }

    public function update(UpdateMasterAgamaRequest $request, master_agama $master_agama)
    {
        echo "kontol";
        abort_unless(\Gate::allows('master_agama_edit'), 403);

        $master_agama->update($request->all());

        return redirect()->route('admin.master_agama.index');
    }

    public function show(master_agama $master_agama)
    {
        abort_unless(\Gate::allows('master_agama_show'), 403);

        return view('admin.master_agama.show', compact('master_agama'));
    }

    public function destroy(master_agama $master_agama)
    {
        abort_unless(\Gate::allows('master_agama_delete'), 403);

        $master_agama->delete();

        return back();
    }

    public function massDestroy(MassDestroyMasterAgamaRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
