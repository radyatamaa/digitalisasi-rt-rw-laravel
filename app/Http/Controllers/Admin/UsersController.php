<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use App\Rt;
use App\Rw;
use App\Kelurahan;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('user_access'), 403);

        $rw = Auth::user()->rw_id;

        $rt = Auth::user()->rt_id;

        $kelurahan = Auth::user()->kelurahan_id;

        if($kelurahan != null){
            $users = User::select(
                'users.*',
                'rw.rw_name')
                ->join('rw', 'rw.id', '=', 'users.rw_id')
                ->where('rw.rw_kel_id', $kelurahan)
                ->get();
        }else if($rw != null){
            $users = User::select(
                'users.*',
                'rt.rt_name')
                ->join('rt', 'rt.id', '=', 'users.rt_id')
                ->where('rt.rt_rw_id', $rw)
                ->get();
        }else{
            $users = User::all();
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('user_create'), 403);

        $rw = Auth::user()->rw_id;

        $rt = Auth::user()->rt_id;

        $kelurahan = Auth::user()->kelurahan_id;

        if ($kelurahan != null) {
            $kelurahan_id = [];

            $rw_id = Rw::where('rw_kel_id', $kelurahan)
                ->pluck('rw_name', 'id');

            $rt_id = [];

            $roles = Role::where('title', 'RW')
                ->pluck('title', 'id');
        } else if ($rw != null) {

            $kelurahan_id = [];

            $rw_id = [];

            $rt_id = Rt::where('rt_rw_id', $rw)
                ->pluck('rt_name', 'id');
            $roles = Role::where('title', 'RT')
                ->pluck('title', 'id');
        } else {
            $rt_id = Rt::all()->pluck('rt_name', 'id');
            $rw_id = Rw::all()->pluck('rw_name', 'id');
            $kelurahan_id = Kelurahan::all()->pluck('kel_name', 'id');
            $roles = Role::all()->pluck('title', 'id');
        }

        return view('admin.users.create', compact('roles', 'rt_id', 'rw_id', 'kelurahan_id'));
    }

    public function store(StoreUserRequest $request)
    {
        abort_unless(\Gate::allows('user_create'), 403);

        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);

        $rw = Auth::user()->rw_id;

        $rt = Auth::user()->rt_id;

        $kelurahan = Auth::user()->kelurahan_id;

        if ($kelurahan != null) {
            $kelurahan_id = Kelurahan::where('id', $kelurahan)
                ->pluck('kel_name', 'id');

            $rw_id = Rw::where('rw_kel_id', $kelurahan)
                ->pluck('rw_name', 'id');

            $rt_id = [];

            $roles = Role::where('title', 'RW')
                ->pluck('title', 'id');
        } else if ($rw != null) {

            $kelurahan_id = [];

            $rw_id = Rw::where('id', $rw)
                ->pluck('rw_name', 'id');

            $rt_id = Rt::where('rt_rw_id', $rw)
                ->pluck('rt_name', 'id');
            $roles = Role::where('title', 'RT')
                ->pluck('title', 'id');
        } else {
            $rt_id = Rt::all()->pluck('rt_name', 'id');
            $rw_id = Rw::all()->pluck('rw_name', 'id');
            $kelurahan_id = Kelurahan::all()->pluck('kel_name', 'id');
            $roles = Role::all()->pluck('title', 'id');
        }

        // $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user', 'rt_id', 'rw_id', 'kelurahan_id'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);

        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_unless(\Gate::allows('user_show'), 403);

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_unless(\Gate::allows('user_delete'), 403);

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
