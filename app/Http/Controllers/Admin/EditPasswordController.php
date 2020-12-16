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

class EditPasswordController extends Controller
{
    public function index()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('user_access'), 403);

        $users = Auth::user();

        return view('admin.edit_password.index', compact('users','userLogin'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);

        if($_POST['password_baru'] != $_POST['password']){

            return redirect()->route('admin.edit_password.index')->with(['error' => 'Password dan confirm password harus sama!!']);
        }else{
            $user->update($request->all());
            $user->roles()->sync($request->input('roles', []));

            return redirect()->route('admin.edit_password.index')->with(['success' => 'Password Telah di ubah']);
        }

    }

}
