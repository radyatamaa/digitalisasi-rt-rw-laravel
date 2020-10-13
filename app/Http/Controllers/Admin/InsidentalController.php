<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInsidentalRequest;
use App\Http\Requests\StoreInsidentalRequest;
use App\Http\Requests\UpdateInsidentalRequest;
use App\Insidental;
use App\Insidental_Category;
use Illuminate\Support\Facades\Auth;
use App\Rt;

class InsidentalController extends Controller
{
    public function index()
    {
        $user = Auth::user()->rt_id;
        abort_unless(\Gate::allows('insidental_access'), 403);
        if($user != null){
            $insidental = Insidental::where('id_rt', $user)->get();
        }else{
            $insidental = Insidental::all();
        }

        return view('admin.insidental.index', compact('insidental','user'));
    }

    public function create()
    {
        $user = Auth::user()->rt_id;
        abort_unless(\Gate::allows('insidental_create'), 403);

        $ins_category = Insidental_Category::all()->pluck('category_name', 'id');

        return view('admin.insidental.create', compact('ins_category','user'));
    }

    public function store(StoreInsidentalRequest $request)
    {
        abort_unless(\Gate::allows('insidental_create'), 403);

        $insidental = Insidental::create($request->all());

        return redirect()->route('admin.insidental.index');
    }

    public function edit(Insidental $insidental)
    {
        $user = Auth::user()->rt_id;
        abort_unless(\Gate::allows('insidental_edit'), 403);

        $ins_category = Insidental_Category::all()->pluck('category_name', 'id');

        return view('admin.insidental.edit', compact('insidental', 'ins_category','user'));
    }

    public function update(UpdateInsidentalRequest $request, Insidental $insidental)
    {

        abort_unless(\Gate::allows('insidental_edit'), 403);

        $insidental->update($request->all());

        return redirect()->route('admin.insidental.index');
    }

    public function show(Insidental $insidental)
    {
        abort_unless(\Gate::allows('insidental_show'), 403);

        return view('admin.insidental.show', compact('insidental'));
    }

    public function destroy(Insidental $insidental)
    {
        abort_unless(\Gate::allows('insidental_delete'), 403);

        $insidental->delete();

        return back();
    }

    public function massDestroy(MassDestroyInsidentalRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
