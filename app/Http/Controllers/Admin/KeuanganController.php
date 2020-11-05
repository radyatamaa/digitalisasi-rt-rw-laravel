<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKeuanganRequest;
use App\Http\Requests\StoreKeuanganRequest;
use App\Http\Requests\UpdateKeuanganRequest;
use App\Keuangan;
use App\Keuangan_Category;
use App\Rt;
use App\Warga;
use App\Master_Alamat;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    public function index()
    {
        $user = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('keuangan_access'), 403);

        if ($user != null) {
            $keuangan = Keuangan::select(
                'keuangan.*',
                'rt.rt_name',
                'keuangan_category.category_name',
                'address_code.address_code_name'
            )
                ->join('rt', 'rt.id', '=', 'keuangan.keuangan_rt')
                ->join('address_code', 'address_code.id', '=', 'keuangan.keuangan_warga_id')
                ->join('keuangan_category', 'keuangan_category.id', '=', 'keuangan.keuangan_category')
                ->where('keuangan.keuangan_rt', $user)
                ->get();
        } else {
            $keuangan = Keuangan::select(
                'keuangan.*',
                'rt.rt_name',
                'keuangan_category.category_name',
                'address_code.address_code_name'
            )
                ->join('rt', 'rt.id', '=', 'keuangan.keuangan_rt')
                ->join('address_code', 'address_code.id', '=', 'keuangan.keuangan_warga_id')
                ->join('keuangan_category', 'keuangan_category.id', '=', 'keuangan.keuangan_category')->get();
        }

        return view('admin.keuangan.index', compact('keuangan', 'user', 'userLogin'));
    }

    public function create()
    {
        $userLogin = Auth::user()->user_fullname;
        $user = Auth::user()->rt_id;
        abort_unless(\Gate::allows('keuangan_create'), 403);
        $keuangan_rt = Rt::all()->pluck('rt_name', 'id');
      
        if ($user != null) {
            $rts = Rt::where('id', $user)->pluck('rt_name', 'id');
            $master_alamats = Master_Alamat::where('address_code_rt', $user)->pluck('address_code_name', 'id');
            $keuangan_category = Keuangan_Category::where('id_rt', $user)->pluck('category_name', 'id');
        } else {
            $rts = Rt::all()->pluck('rt_name', 'id');
            $master_alamats = Master_Alamat::all()->pluck('address_code_name', 'id');
            $keuangan_category = Keuangan_Category::where('id_rt', $user)->pluck('category_name', 'id');
        }
        return view('admin.keuangan.create', compact('keuangan_rt', 'keuangan_category', 'user','userLogin','master_alamats'));

    }

    public function store(StoreKeuanganRequest $request)
    {
        abort_unless(\Gate::allows('keuangan_create'), 403);

        $period = $_POST['keuangan_periode'] . '-1';
        $insert = array(
            'keuangan_tipe' => $_POST['keuangan_tipe'],
            'keuangan_category' => $_POST['keuangan_category'],
            'keuangan_periode' => $period,
            'keuangan_value' => $_POST['keuangan_value'],
            'keuangan_warga_id' => $_POST['keuangan_warga_id'],
            'keuangan_rt' => $_POST['keuangan_rt'],
        );
        $keuangan = Keuangan::create($insert);

        return redirect()->route('admin.keuangan.index');
    }

    public function edit(Keuangan $keuangan)
    {
        $userLogin = Auth::user()->user_fullname;
        $user = Auth::user()->rt_id;
        abort_unless(\Gate::allows('keuangan_edit'), 403);
        $keuangan_rt = Rt::all()->pluck('rt_name', 'id');
        $periodConvert = date('yy-m', strtotime($keuangan->keuangan_periode));
        if ($user != null) {
            $rts = Rt::where('id', $user)->pluck('rt_name', 'id');
            $master_alamats = Master_Alamat::where('address_code_rt', $user)->pluck('address_code_name', 'id');
            $keuangan_category = Keuangan_Category::where('id_rt', $user)->pluck('category_name', 'id');
            
        } else {
            $rts = Rt::all()->pluck('rt_name', 'id');
            $master_alamats = Master_Alamat::all()->pluck('address_code_name', 'id');
            $keuangan_category = Keuangan_Category::where('id_rt', $user)->pluck('category_name', 'id');
        }
        return view('admin.keuangan.edit', compact('periodConvert','keuangan', 'keuangan_rt', 'keuangan_category', 'master_alamats', 'user', 'userLogin'));
    }

    public function update(UpdateKeuanganRequest $request, Keuangan $keuangan)
    {

        abort_unless(\Gate::allows('keuangan_edit'), 403);

        $period = $_POST['keuangan_periode'] . '-1';
        $update = array(
            'keuangan_tipe' => $_POST['keuangan_tipe'],
            'keuangan_category' => $_POST['keuangan_category'],
            'keuangan_periode' => $period,
            'keuangan_value' => $_POST['keuangan_value'],
            'keuangan_warga_id' => $_POST['keuangan_warga_id'],
            'keuangan_rt' => $_POST['keuangan_rt'],
        );
        $keuangan->update($update);

        return redirect()->route('admin.keuangan.index');
    }

    public function show(Keuangan $keuangan)
    {
        abort_unless(\Gate::allows('keuangan_show'), 403);

        return view('admin.keuangan.show', compact('keuangan'));
    }

    public function destroy(Keuangan $keuangan)
    {
        abort_unless(\Gate::allows('keuangan_delete'), 403);

        $keuangan->delete();

        return back();
    }

    public function massDestroy(MassDestroyKeuanganRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
