<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHistoryCategoryRequest;
use App\Http\Requests\StoreHistoryCategoryRequest;
use App\Http\Requests\UpdateHistoryCategoryRequest;
use App\History_Category;
use Illuminate\Support\Facades\Auth;

class HistoryCategoryController extends Controller
{
    public function index()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('history_category_access'), 403);
        $history_category = History_Category::all();

        return view('admin.history_category.index', compact('history_category', 'userLogin'));
    }

    public function create()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('history_category_create'), 403);

        return view('admin.history_category.create', compact('userLogin'));
    }

    public function store(StoreHistoryCategoryRequest $request)
    {
        abort_unless(\Gate::allows('history_category_create'), 403);

        $history_category = History_Category::create($request->all());

        return redirect()->route('admin.history_category.index');
    }

    public function edit(History_Category $history_category)
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('history_category_edit'), 403);

        return view('admin.history_category.edit', compact('history_category', 'userLogin'));
    }

    public function update(UpdateHistoryCategoryRequest $request, History_Category $history_category)
    {

        abort_unless(\Gate::allows('history_category_edit'), 403);

        $history_category->update($request->all());

        return redirect()->route('admin.history_category.index');
    }

    public function show(History_Category $history_category)
    {
        abort_unless(\Gate::allows('history_category_show'), 403);

        return view('admin.history_category.show', compact('history_category'));
    }

    public function destroy(History_Category $history_category)
    {
        abort_unless(\Gate::allows('history_category_delete'), 403);

        $history_category->delete();

        return back();
    }

    public function massDestroy(MassDestroyHistoryCategoryRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
