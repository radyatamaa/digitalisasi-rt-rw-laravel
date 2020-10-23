<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Event;
use App\Event_Category;
use App\Rt;

use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $user = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('event_access'), 403);
        if ($user != null) {
            $event = Event::select(
                'event.*',
                'rt.rt_name',
                'event_category.category_name'
            )
                ->join('rt', 'rt.id', '=', 'event.event_rt')
                ->join('event_category', 'event_category.id', '=', 'event.event_category')->where('event_rt', $user)->get();
        } else {
            $event = Event::select(
                'event.*',
                'rt.rt_name',
                'event_category.category_name'
            )
                ->join('rt', 'rt.id', '=', 'event.event_rt')
                ->join('event_category', 'event_category.id', '=', 'event.event_category')->get();
        }


        return view('admin.event.index', compact('event', 'user', 'userLogin'));
    }

    public function create()
    {
        $rts = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('event_create'), 403);
        $event_rt = Rt::all()->pluck('rt_name', 'id');
        if ($rts != null) {

            $event_categorys = Event_Category::where('id_rt', $rts)->pluck('category_name', 'id');
        } else {

            $event_categorys = Event_Category::all()->pluck('category_name', 'id');
        }
        return view('admin.event.create', compact('event_rt', 'event_categorys', 'rts', 'userLogin'));
    }

    public function store(StoreEventRequest $request)
    {
        abort_unless(\Gate::allows('event_create'), 403);

        $event = Event::create($request->all());

        return redirect()->route('admin.event.index');
    }

    public function edit(Event $event)
    {
        $rts = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('event_edit'), 403);
        $event_rt = Rt::all()->pluck('rt_name', 'id');

        if ($rts != null) {

            $event_categorys = Event_Category::where('id_rt', $rts)->pluck('category_name', 'id');
        } else {

            $event_categorys = Event_Category::all()->pluck('category_name', 'id');
        }
        return view('admin.event.edit', compact('event', 'event_rt', 'event_categorys', 'rts', 'userLogin'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {

        abort_unless(\Gate::allows('event_edit'), 403);

        $event->update($request->all());

        return redirect()->route('admin.event.index');
    }

    public function show(Event $event)
    {
        abort_unless(\Gate::allows('event_show'), 403);

        return view('admin.event.show', compact('event'));
    }

    public function destroy(Event $event)
    {
        abort_unless(\Gate::allows('event_delete'), 403);

        $event->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
