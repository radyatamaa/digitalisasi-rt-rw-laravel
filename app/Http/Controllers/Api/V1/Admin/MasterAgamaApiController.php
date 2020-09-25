<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasterAgamaRequest;
use App\Http\Requests\UpdateMasterAgamaRequest;
use App\Master_Agama;

class MasterAgamaApiController extends Controller
{
    public function index()
    {
        $sdm_category = Master_Agama::all();

        return $sdm_category;
    }

    public function store(StoreMasterAgamaRequest $request)
    {
        return Master_Agama::create($request->all());
    }

    public function update(UpdateMasterAgamaRequest $request, Master_Agama $master_agama)
    {
        return $master_agama->update($request->all());
    }

    public function show(Master_Agama $master_agama)
    {
        return $master_agama;
    }

    public function destroy(Master_Agama $master_agama)
    {
        return $master_agama->delete();
    }
}
