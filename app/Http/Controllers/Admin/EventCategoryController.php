<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventCategoryRequest;
use App\Http\Requests\StoreEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;
use App\Event_Category;
use App\Rt;
use Illuminate\Support\Facades\Auth;

class EventCategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user()->rw_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('event_category_access'), 403);

        if ($user != null) {
            $event_category = Event_Category::select(
                'event_category.*',
                'rt.rt_name'
            )
                ->join('rt', 'rt.id', '=', 'event_category.id_rt')->where('id_rw', $user)->get();
        } else {
            $event_category = Event_Category::select(
                'event_category.*',
                'rt.rt_name'
            )

                ->join('rt', 'rt.id', '=', 'event_category.id_rt')->get();
        }


        return view('admin.event_category.index', compact('event_category', 'user', 'userLogin'));
    }


    public function create()
    {
        $rws = Auth::user()->rw_id;
        $userLogin = Auth::user()->user_fullname;
        $id_rt = Rt::all()->pluck('rt_name', 'id');
        abort_unless(\Gate::allows('event_category_create'), 403);

        return view('admin.event_category.create', compact('rws', 'userLogin', 'id_rt'));
    }

    public function store(StoreEventCategoryRequest $request)
    {
        abort_unless(\Gate::allows('event_category_create'), 403);

        $event_category = Event_Category::create($request->all());

        return redirect()->route('admin.event_category.index');
    }

    public function edit(Event_Category $event_category)
    {
        $rws = Auth::user()->rw_id;
        $userLogin = Auth::user()->user_fullname;
        $id_rt = Rt::all()->pluck('rt_name', 'id');
        abort_unless(\Gate::allows('event_category_edit'), 403);

        return view('admin.event_category.edit', compact('event_category', 'rws', 'userLogin', 'id_rt'));
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
