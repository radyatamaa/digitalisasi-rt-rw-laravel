<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHistoryCategoryRequest;
use App\Http\Requests\UpdateHistoryCategoryRequest;
use App\History_Category;

class HistoryCategoryApiController extends Controller
{
    public function index()
    {
        $history_category = History_Category::all();

        return $history_category;
    }

    public function store(StoreHistoryCategoryRequest $request)
    {
        return History_Category::create($request->all());
    }

    public function update(UpdateHistoryCategoryRequest $request, History_Category $history_category)
    {
        return $history_category->update($request->all());
    }

    public function show(History_Category $history_category)
    {
        return $history_category;
    }

    public function destroy(History_Category $history_category)
    {
        return $history_category->delete();
    }
}
