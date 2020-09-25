<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInsidentalCategoryRequest;
use App\Http\Requests\UpdateInsidentalCategoryRequest;
use App\Insidental_Category;

class InsidentalCategoryApiController extends Controller
{
    public function index()
    {
        $insidental_category = Insidental_Category::all();

        return $insidental_category;
    }

    public function store(StoreInsidentalCategoryRequest $request)
    {
        return Insidental_Category::create($request->all());
    }

    public function update(UpdateInsidentalCategoryRequest $request, Insidental_Category $insidental_category)
    {
        return $insidental_category->update($request->all());
    }

    public function show(Insidental_Category $insidental_category)
    {
        return $insidental_category;
    }

    public function destroy(Insidental_Category $insidental_category)
    {
        return $insidental_category->delete();
    }
}
