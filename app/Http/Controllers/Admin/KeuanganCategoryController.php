<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKeuanganCategoryRequest;
use App\Http\Requests\StoreKeuanganCategoryRequest;
use App\Http\Requests\UpdateKeuanganCategoryRequest;
use App\Keuangan_Category;
use Illuminate\Support\Facades\Auth;
use App\Rt;

class KeuanganCategoryController extends Controller
{
    public function index()
    {

        $user = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('keuangan_category_access'), 403);
        if ($user != null) {
            $keuangan_category = Keuangan_Category::where('id_rt', $user)->get();
        } else {
            $keuangan_category = Keuangan_Category::all();
        }
        return view('admin.keuangan_category.index', compact('keuangan_category', 'user', 'userLogin'));
    }

    public function create()
    {
        $user = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('keuangan_category_create'), 403);

        return view('admin.keuangan_category.create', compact('user', 'userLogin'));
    }

    public function store(StoreKeuanganCategoryRequest $request)
    {
        abort_unless(\Gate::allows('keuangan_category_create'), 403);

        $keuangan_category = Keuangan_Category::create($request->all());

        return redirect()->route('admin.keuangan_category.index');
    }

    public function edit(Keuangan_Category $keuangan_category)
    {
        $user = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('keuangan_category_edit'), 403);

        return view('admin.keuangan_category.edit', compact('keuangan_category', 'user', 'userLogin'));
    }

    public function update(UpdateKeuanganCategoryRequest $request, Keuangan_Category $keuangan_category)
    {

        abort_unless(\Gate::allows('keuangan_category_edit'), 403);

        $keuangan_category->update($request->all());

        return redirect()->route('admin.keuangan_category.index');
    }

    public function show(Keuangan_Category $keuangan_category)
    {
        abort_unless(\Gate::allows('keuangan_category_show'), 403);

        return view('admin.keuangan_category.show', compact('keuangan_category'));
    }

    public function destroy(Keuangan_Category $keuangan_category)
    {
        abort_unless(\Gate::allows('keuangan_category_delete'), 403);

        $keuangan_category->delete();

        return back();
    }

    public function massDestroy(MassDestroyKeuanganCategoryRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
