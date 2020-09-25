<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSdmCategoryRequest;
use App\Http\Requests\UpdateSdmCategoryRequest;
use App\Sdm_Category;

class SdmCategoryApiController extends Controller
{
    public function index()
    {
        $sdm_category = Sdm_Category::all();

        return $sdm_category;
    }

    public function store(StoreSdmCategoryRequest $request)
    {
        return Sdm_Category::create($request->all());
    }

    public function update(UpdateSdmCategoryRequest $request, Sdm_Category $sdm_category)
    {
        return $sdm_category->update($request->all());
    }

    public function show(Sdm_Category $sdm_category)
    {
        return $sdm_category;
    }

    public function destroy(Sdm_Category $sdm_category)
    {
        return $sdm_category->delete();
    }
}
