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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Auth\Authenticatable;


class EditPasswordController extends Controller
{
    public function index()
    {
        $userLogin = Auth::user()->user_fullname;
        // abort_unless(\Gate::allows('user_access'), 403);


        $users = Auth::user();

        return view('admin.edit_password.index', compact('users','userLogin'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        // abort_unless(\Gate::allows('user_edit'), 403);
        $id = Auth::user()->id;
        $pass = Auth::user()->password;
        $checkPass = Hash::check($_POST['password_lama'], $pass);
        $passEncrypt = Hash::make($_POST['password']);
        if($checkPass != true){

            return redirect()->route('admin.edit_password.index')->with(['error' => 'Password lama tidak sama!!']);
        }else if($_POST['password_baru'] != $_POST['password']){

            return redirect()->route('admin.edit_password.index')->with(['error' => 'Password dan confirm password harus sama!!']);
        }else{
        //    $update = $user->update($request->all());
          $update = DB::table('users')
           ->where('id', $id)
           ->update(['password' => $passEncrypt]);

            return redirect()->route('admin.edit_password.index')->with(['success' => 'Password Telah di ubah']);
        }

    }

}
