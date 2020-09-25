<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInsidentalCategoryRequest;
use App\Http\Requests\StoreInsidentalCategoryRequest;
use App\Http\Requests\UpdateInsidentalCategoryRequest;
use App\Insidental_Category;
class InsidentalCategoryController extends Controller
{
    public function index()
    {
       
        abort_unless(\Gate::allows('insidental_category_access'), 403);
        $insidental_category = Insidental_Category::all();

        return view('admin.insidental_category.index', compact('insidental_category'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('insidental_category_create'), 403);

        return view('admin.insidental_category.create');
    }

    public function store(StoreInsidentalCategoryRequest $request)
    {
        abort_unless(\Gate::allows('insidental_category_create'), 403);

        $insidental_category = Insidental_Category::create($request->all());

        return redirect()->route('admin.insidental_category.index');
    }

    public function edit(Insidental_Category $insidental_category)
    {
        abort_unless(\Gate::allows('insidental_category_edit'), 403);

        return view('admin.insidental_category.edit', compact('insidental_category'));
    }

    public function update(UpdateInsidentalCategoryRequest $request, Insidental_Category $insidental_category)
    {
        
        abort_unless(\Gate::allows('insidental_category_edit'), 403);

        $insidental_category->update($request->all());
        
        return redirect()->route('admin.insidental_category.index');
    }

    public function show(Insidental_Category $insidental_category)
    {
        abort_unless(\Gate::allows('insidental_category_show'), 403);

        return view('admin.insidental_category.show', compact('insidental_category'));
    }

    public function destroy(Insidental_Category $insidental_category)
    {
        abort_unless(\Gate::allows('insidental_category_delete'), 403);

        $insidental_category->delete();

        return back();
    }

    public function massDestroy(MassDestroyInsidentalCategoryRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
