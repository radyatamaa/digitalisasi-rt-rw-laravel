<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;
use App\Event_Category;

class EventCategoryApiController extends Controller
{
    public function index()
    {
        $event_category = Event_Category::all();

        return $event_category;
    }

    public function store(StoreEventCategoryRequest $request)
    {
        return Event_Category::create($request->all());
    }

    public function update(UpdateEventCategoryRequest $request, Event_Category $event_category)
    {
        return $event_category->update($request->all());
    }

    public function show(Event_Category $event_category)
    {
        return $event_category;
    }

    public function destroy(Event_Category $event_category)
    {
        return $event_category->delete();
    }
}
