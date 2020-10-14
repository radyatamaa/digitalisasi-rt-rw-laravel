<?php

namespace App\Http\Controllers\Admin;

use App\Rt;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySekolahRequest;
use App\Http\Requests\StoreSekolahRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Sekolah;
use App\Pendidikan;
use App\Wilayah;
use Illuminate\Support\Facades\Auth;

class SekolahController extends Controller
{
    public function index()
    {
        $userLogin = Auth::user()->user_fullname;
        $user = Auth::user()->rt_id;

        abort_unless(\Gate::allows('sekolah_access'), 403);
        if ($user != null) {
            $sekolah = Sekolah::where('sekolah_rt', $user)->get();
        } else {
            $sekolah = sekolah::all();
        }

        return view('admin.sekolah.index', compact('sekolah','userLogin'));
    }

    public function create()
    {
        $userLogin = Auth::user()->user_fullname;
        $rts = Auth::user()->rt_id;
        abort_unless(\Gate::allows('sekolah_create'), 403);
        $sekolah_pendidikan = Pendidikan::all()->pluck('pendidikan_name', 'id');
        $sekolah_wilayah = Wilayah::all()->pluck('wilayah_name', 'id');


        return view('admin.sekolah.create', compact('sekolah_pendidikan', 'rts', 'sekolah_wilayah','userLogin'));
    }

    public function store(StoreSekolahRequest $request)
    {
        abort_unless(\Gate::allows('sekolah_create'), 403);

        $sekolah = Sekolah::create($request->all());


        return redirect()->route('admin.sekolah.index');
    }

    public function edit(Sekolah $sekolah)
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('sekolah_edit'), 403);
        $rts = Auth::user()->rt_id;
        $sekolah_pendidikan = Pendidikan::all()->pluck('pendidikan_name', 'id');
        $sekolah_wilayah = Wilayah::all()->pluck('wilayah_name', 'id');
        return view('admin.sekolah.edit', compact('sekolah', 'rts', 'sekolah_pendidikan', 'sekolah_wilayah','userLogin'));
    }

    public function update(UpdateSekolahRequest $request, Sekolah $sekolah)
    {

        abort_unless(\Gate::allows('sekolah_edit'), 403);

        $sekolah->update($request->all());

        return redirect()->route('admin.sekolah.index');
    }

    public function show(Sekolah $sekolah)
    {
        abort_unless(\Gate::allows('sekolah_show'), 403);

        return view('admin.sekolah.show', compact('sekolah'));
    }

    public function destroy(Sekolah $sekolah)
    {
        abort_unless(\Gate::allows('sekolah_delete'), 403);

        $sekolah->delete();

        return back();
    }

    public function massDestroy(MassDestroySekolahRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
