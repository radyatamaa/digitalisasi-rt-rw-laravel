<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySdmCategoryRequest;
use App\Http\Requests\StoreSdmCategoryRequest;
use App\Http\Requests\UpdateSdmCategoryRequest;
use App\Sdm_Category;
use Illuminate\Support\Facades\Auth;
use App\Rt;

class SdmCategoryController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('sdm_category_access'), 403);
        $rt = Auth::user()->rt_id;
        if($rt != null){
            $sdm_category = Sdm_Category::where('id_rt', $rt)->get();
        }else{
            $sdm_category = Sdm_Category::all();
        }

        return view('admin.sdm_category.index', compact('sdm_category'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('sdm_category_create'), 403);
        $rt = Auth::user()->rt_id;
        return view('admin.sdm_category.create', compact('rt'));
    }

    public function store(StoreSdmCategoryRequest $request)
    {
        abort_unless(\Gate::allows('sdm_category_create'), 403);
             
        $sdm_category = Sdm_Category::create($request->all());

        return redirect()->route('admin.sdm_category.index');
    }

    public function edit(Sdm_Category $sdm_category)
    {
        abort_unless(\Gate::allows('sdm_category_edit'), 403);
        
        $rt = Auth::user()->rt_id;

        return view('admin.sdm_category.edit', compact('sdm_category','rt'));
    }

    public function update(UpdateSdmCategoryRequest $request, Sdm_Category $sdm_category)
    {
        abort_unless(\Gate::allows('sdm_category_edit'), 403);

        $sdm_category->update($request->all());
        
        return redirect()->route('admin.sdm_category.index');
    }

    public function show(Sdm_Category $sdm_category)
    {
        abort_unless(\Gate::allows('sdm_category_show'), 403);

        return view('admin.sdm_category.show', compact('sdm_category'));
    }

    public function destroy(Sdm_Category $sdm_category)
    {
        abort_unless(\Gate::allows('sdm_category_delete'), 403);

        $sdm_category->delete();

        return back();
    }

    public function massDestroy(MassDestroySdmCategoryRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
