<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPendidikanRequest;
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;
use App\Pendidikan;
use Illuminate\Support\Facades\Auth;
class PendidikanController extends Controller
{
    public function index()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('pendidikan_access'), 403);

        $pendidikan = Pendidikan::all();

        return view('admin.pendidikan.index', compact('pendidikan','userLogin'));
    }

    public function create()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('pendidikan_create'), 403);

        return view('admin.pendidikan.create', compact('userLogin'));
    }

    public function store(StorePendidikanRequest $request)
    {
        abort_unless(\Gate::allows('pendidikan_create'), 403);

        $pendidikan = Pendidikan::create($request->all());

        return redirect()->route('admin.pendidikan.index');
    }

    public function edit(pendidikan $pendidikan)
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('pendidikan_edit'), 403);

        return view('admin.pendidikan.edit', compact('pendidikan','userLogin'));
    }

    public function update(UpdatePendidikanRequest $request, pendidikan $pendidikan)
    {
        abort_unless(\Gate::allows('pendidikan_edit'), 403);

        $pendidikan->update($request->all());

        return redirect()->route('admin.pendidikan.index');
    }

    public function show(pendidikan $pendidikan)
    {
        abort_unless(\Gate::allows('pendidikan_show'), 403);

        return view('admin.pendidikan.show', compact('pendidikan'));
    }

    public function destroy(pendidikan $pendidikan)
    {
        abort_unless(\Gate::allows('pendidikan_delete'), 403);

        $pendidikan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPendidikanRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
