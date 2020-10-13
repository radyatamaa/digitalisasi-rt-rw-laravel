<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventCategoryRequest;
use App\Http\Requests\StoreEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;
use App\Event_Category;
use App\rt;
use Illuminate\Support\Facades\Auth;

class EventCategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user()->rt_id;
        abort_unless(\Gate::allows('event_category_access'), 403);
        $event_category = Event_Category::all();
        if ($user != null) {
            $event_category = Event_Category::where('id_rt', $user)->get();
        } else {
            $event_category = Event_Category::all();
        }

        return view('admin.event_category.index', compact('event_category', 'user'));
    }

    public function create()
    {
        $rts = Auth::user()->rt_id;
        abort_unless(\Gate::allows('event_category_create'), 403);

        return view('admin.event_category.create', compact('rts'));
    }

    public function store(StoreEventCategoryRequest $request)
    {
        abort_unless(\Gate::allows('event_category_create'), 403);

        $event_category = Event_Category::create($request->all());

        return redirect()->route('admin.event_category.index');
    }

    public function edit(Event_Category $event_category)
    {
        $rts = Auth::user()->rt_id;
        abort_unless(\Gate::allows('event_category_edit'), 403);

        return view('admin.event_category.edit', compact('event_category', 'rts'));
    }

    public function update(UpdateEventCategoryRequest $request, Event_Category $event_category)
    {

        abort_unless(\Gate::allows('event_category_edit'), 403);

        $event_category->update($request->all());

        return redirect()->route('admin.event_category.index');
    }

    public function show(Event_Category $event_category)
    {
        abort_unless(\Gate::allows('event_category_show'), 403);

        return view('admin.event_category.show', compact('event_category'));
    }

    public function destroy(Event_Category $event_category)
    {
        abort_unless(\Gate::allows('event_category_delete'), 403);

        $event_category->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventCategoryRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
