<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventCategoryRequest;
use App\Http\Requests\StoreEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;
use App\Event_Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class LogoutController extends Controller
{
    public function index()
    {       
        Auth::logout();
        return Redirect::to('admin');
    }
}
