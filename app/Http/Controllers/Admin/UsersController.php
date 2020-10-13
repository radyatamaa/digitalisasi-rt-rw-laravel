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

        // $rw = Auth::user()->rw_id;

        // $rt = Auth::user()->rt_id;
        
        // $kelurahan = Auth::user()->kelurahan_id;

        // if($rw != null){
        //     User::all()->where('rt_rw_id', $user)->get();
        // }else if($kelurahan != null){
        //     User::all()->where('rw_id', $user)->get();
        // }else{
         
            // $users = User::select('users.*,
            // rw.rw_name,
            // rt.rt_name,
            // kelurahan.kel_name
            // FROM users 
            // JOIN kelurahan ON kelurahan.id = users.kelurahan_id OR users.kelurahan_id = null
            // JOIN rt ON rt.id = users.rt_id OR users.rt_id = null
            // JOIN rw ON rw_id = users.rw_id OR users.rw_id = null')->get();

            $users = User::all();            

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('user_create'), 403);
        
        $rw = Auth::user()->rw_id;

        $rt = Auth::user()->rt_id;
        
        $kelurahan = Auth::user()->kelurahan_id;

        if($kelurahan != null){
            $kelurahan_id = Kelurahan::all()->where('id', $kelurahan)
            ->pluck('kel_name', 'id');           
           
            $rw_id = Rw::all()->where('rw_kel_id', $kelurahan)
            ->pluck('rw_name', 'id');
            
            $rt_id = [];

            $roles = Role::all()->where('title', 'RW')
            ->pluck('title', 'id'); 

        }else if($rw != null){

            $kelurahan_id = [];

            $rw_id = Rw::all()->where('id', $rw)
            ->pluck('rw_name', 'id');

            $rt_id = Rt::all()->where('rt_rw_id', $rw)
            ->pluck('rt_name', 'id');
            $roles = Role::all()->where('title', 'RT')
            ->pluck('title', 'id'); 
        }else{
            $rt_id = Rt::all()->pluck('rt_name', 'id');
            $rw_id = Rw::all()->pluck('rw_name', 'id');
            $kelurahan_id = Kelurahan::all()->pluck('kel_name', 'id');   
            $roles = Role::all()->pluck('title', 'id'); 
        }       

        return view('admin.users.create', compact('roles','rt_id','rw_id','kelurahan_id'));
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

        if($kelurahan != null){
            $kelurahan_id = Kelurahan::all()->where('id', $kelurahan)
            ->pluck('kel_name', 'id');           
           
            $rw_id = Rw::all()->where('rw_kel_id', $kelurahan)
            ->pluck('rw_name', 'id');
            
            $rt_id = [];

            $roles = Role::all()->where('title', 'RW')
            ->pluck('title', 'id'); 

        }else if($rw != null){

            $kelurahan_id = [];

            $rw_id = Rw::all()->where('id', $rw)
            ->pluck('rw_name', 'id');

            $rt_id = Rt::all()->where('rt_rw_id', $rw)
            ->pluck('rt_name', 'id');
            $roles = Role::all()->where('title', 'RT')
            ->pluck('title', 'id'); 
        }else{
            $rt_id = Rt::all()->pluck('rt_name', 'id');
            $rw_id = Rw::all()->pluck('rw_name', 'id');
            $kelurahan_id = Kelurahan::all()->pluck('kel_name', 'id');   
            $roles = Role::all()->pluck('title', 'id'); 
        }       

        // $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user','rt_id','rw_id','kelurahan_id'));
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
