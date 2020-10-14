<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKelurahanRequest;
use App\Http\Requests\StoreKelurahanRequest;
use App\Http\Requests\UpdateKelurahanRequest;
use App\Kelurahan;
use Illuminate\Support\Facades\Auth;

class KelurahanController extends Controller
{
    public function index()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('kelurahan_access'), 403);
        $kelurahan = Kelurahan::all();

        return view('admin.kelurahan.index', compact('kelurahan', 'userLogin'));
    }

    public function create()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('kelurahan_create'), 403);

        return view('admin.kelurahan.create', compact('userLogin'));
    }

    public function store(StoreKelurahanRequest $request)
    {
        abort_unless(\Gate::allows('kelurahan_create'), 403);

        $kelurahan = Kelurahan::create($request->all());

        return redirect()->route('admin.kelurahan.index');
    }

    public function edit(kelurahan $kelurahan)
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('kelurahan_edit'), 403);

        return view('admin.kelurahan.edit', compact('kelurahan', 'userLogin'));
    }

    public function update(UpdateKelurahanRequest $request, kelurahan $kelurahan)
    {

        abort_unless(\Gate::allows('kelurahan_edit'), 403);

        $kelurahan->update($request->all());

        return redirect()->route('admin.kelurahan.index');
    }

    public function show(kelurahan $kelurahan)
    {
        abort_unless(\Gate::allows('kelurahan_show'), 403);

        return view('admin.kelurahan.show', compact('kelurahan'));
    }

    public function destroy(kelurahan $kelurahan)
    {
        abort_unless(\Gate::allows('kelurahan_delete'), 403);

        $kelurahan->delete();

        return back();
    }

    public function massDestroy(MassDestroyKelurahanRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
