<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySdmRequest;
use App\Http\Requests\StoreSdmRequest;
use App\Http\Requests\UpdateSdmRequest;
use App\Sdm;
use App\Rt;
use App\Sdm_Category;
use Illuminate\Support\Facades\Auth;

class SdmController extends Controller
{
    public function index()
    {
      
        abort_unless(\Gate::allows('sdm_access'), 403);
        $userLogin = Auth::user()->user_fullname;
        $user = Auth::user()->rt_id;
        if ($user != null) {
            $sdm = Sdm::select(
                'sdm.*',
                'rt.rt_name',
                'sdm_category.category_name'
            )
                ->join('rt', 'rt.id', '=', 'sdm.sdm_rt')
                ->join('sdm_category', 'sdm_category.id', '=', 'sdm.sdm_category')->where('sdm_rt', $user)->get();
        } else {
            $sdm = Sdm::select(
                'sdm.*',
                'rt.rt_name',
                'sdm_category.category_name'
            )
                ->join('rt', 'rt.id', '=', 'sdm.sdm_rt')
                ->join('sdm_category', 'sdm_category.id', '=', 'sdm.sdm_category')->get();
        }


        return view('admin.sdm.index', compact('sdm','user','userLogin'));
    }

    public function create()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('sdm_create'), 403);
        $user = Auth::user()->rt_id;
        $sdm_rt = Rt::all()->pluck('rt_name', 'id');
        if ($user != null) {
            
            $sdm_categorys = Sdm_Category::where('id_rt', $user)->pluck('category_name', 'id');
            
        } else {
           
            $sdm_categorys = Sdm_Category::all()->pluck('category_name', 'id');
           
        }
        return view('admin.sdm.create', compact('user','sdm_rt','sdm_categorys','userLogin'));
    }

    public function store(StoreSdmRequest $request)
    {
        abort_unless(\Gate::allows('sdm_create'), 403);
             
        $sdm = Sdm::create($request->all());

        return redirect()->route('admin.sdm.index');
    }

    public function edit(Sdm $sdm)
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('sdm_edit'), 403);
        
        $user = Auth::user()->rt_id;
        $sdm_rt = Rt::all()->pluck('rt_name', 'id');
       
        if ($user != null) {
            
            $sdm_categorys = Sdm_Category::where('id_rt', $user)->pluck('category_name', 'id');
            
        } else {
           
            $sdm_categorys = Sdm_Category::all()->pluck('category_name', 'id');
           
        }
        return view('admin.sdm.edit', compact('sdm','user','sdm_rt','sdm_categorys','userLogin'));
    }

    public function update(UpdateSdmRequest $request, Sdm $sdm)
    {
        abort_unless(\Gate::allows('sdm_edit'), 403);

        $sdm->update($request->all());
        
        return redirect()->route('admin.sdm.index');
    }

    public function show(Sdm $sdm)
    {
        abort_unless(\Gate::allows('sdm_show'), 403);

        return view('admin.sdm.show', compact('sdm'));
    }

    public function destroy(Sdm $sdm)
    {
        abort_unless(\Gate::allows('sdm_delete'), 403);

        $sdm->delete();

        return back();
    }

    public function massDestroy(MassDestroySdmRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
