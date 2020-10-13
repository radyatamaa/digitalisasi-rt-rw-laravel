<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
class HomeController
{
    public function index()
    {
        
        $user = Auth::user()->user_fullname;
        return view('home',compact('user'));
    }
}
