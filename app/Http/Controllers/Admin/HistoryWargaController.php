<?php

namespace App\Http\Controllers\Admin;

use App\History_Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHistoryWargaRequest;
use App\Http\Requests\StoreHistoryWargaRequest;
use App\Http\Requests\UpdateHistoryWargaRequest;
use App\History_Warga;
use App\Warga;
use App\Rt;
use App\Provinces;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use App\Rw;
use Illuminate\Support\Facades\Auth;

class HistoryWargaController extends Controller
{
    public function index()
    {
        $user = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('history_warga_access'), 403);
        if ($user != null) {
            $history_warga = history_warga::select(
                'history_warga.*',
                'history_category.category_name',
                'warga.warga_first_name',
                'warga.warga_last_name'

            )
                ->join('history_category', 'history_category.id', '=', 'history_warga.history_category')
                ->join('warga', 'warga.id', '=', 'history_warga.warga_id')
                ->where('history_warga.id_rt', $user)
                ->get();
        } else {
            $history_warga = history_warga::select(
                'history_warga.*',
                'history_category.category_name',
                'warga.warga_first_name',
                'warga.warga_last_name'
            )
                ->join('history_category', 'history_category.id', '=', 'history_warga.history_category')
                ->join('warga', 'warga.id', '=', 'history_warga.warga_id')->get();
        }

        return view('admin.history_warga.index', compact('history_warga', 'userLogin'));
    }

    public function create()
    {
        $rts = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('history_warga_create'), 403);
        if ($rts != null) {
            $warga_ids = Warga::select(
                'warga.*',
                'religion.religion_name',
                'rt.rt_name',
                'pendidikan.pendidikan_name',
                'address_code.address_code_name',
                'job.job_name',
                'salary.salary_start',
                'salary.salary_end'
            )
                ->join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_rt', $rts)
                ->get();
        } else {
            $warga_ids = Warga::select(
                'warga.*',
                'religion.religion_name',
                'rt.rt_name',
                'pendidikan.pendidikan_name',
                'address_code.address_code_name',
                'job.job_name',
                'salary.salary_start',
                'salary.salary_end'
            )
                ->join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->get();
        }

        $history_category = History_Category::all()->pluck('category_name', 'id');
        $rt_id = Rt::all()->pluck('rt_name', 'id');
        $provinsi_id = Provinces::all()->pluck('name', 'id');
        $kota_id = Kabupaten::all()->pluck('name', 'id');
        $kecamatan_id = Kecamatan::all()->pluck('kec_name', 'id');
        $kelurahan_id = Kelurahan::all()->pluck('kel_name', 'id');
        $rw_id = Rw::all()->pluck('rw_name', 'id');


        return view('admin.history_warga.create', compact('history_category', 'warga_ids', 'rts', 'userLogin', 'rt_id', 'provinsi_id', 'kota_id', 'kecamatan_id', 'kelurahan_id', 'rw_id'));
    }

    public function store(StoreHistoryWargaRequest $request)
    {
        abort_unless(\Gate::allows('history_warga_create'), 403);

        $history_warga = History_Warga::create($request->all());

        return redirect()->route('admin.history_warga.index');
    }

    public function edit(History_Warga $history_warga)
    {
        $rts = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('history_warga_edit'), 403);
        if ($rts != null) {
            $warga_ids = Warga::select(
                'warga.*',
                'religion.religion_name',
                'rt.rt_name',
                'pendidikan.pendidikan_name',
                'address_code.address_code_name',
                'job.job_name',
                'salary.salary_start',
                'salary.salary_end'
            )
                ->join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_rt', $rts)
                ->get();
        } else {
            $warga_ids = Warga::select(
                'warga.*',
                'religion.religion_name',
                'rt.rt_name',
                'pendidikan.pendidikan_name',
                'address_code.address_code_name',
                'job.job_name',
                'salary.salary_start',
                'salary.salary_end'
            )
                ->join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->get();
        }

        $history_category = History_Category::all()->pluck('category_name', 'id');

        $rt_id = Rt::all()->pluck('rt_name', 'id');
        $provinsi_id = Provinces::all()->pluck('name', 'id');
        $kota_id = Kabupaten::all()->pluck('name', 'id');
        $kecamatan_id = Kecamatan::all()->pluck('kec_name', 'id');
        $kelurahan_id = Kelurahan::all()->pluck('kel_name', 'id');
        $rw_id = Rw::all()->pluck('rw_name', 'id');

        $rt_id1 = Rt::all()->pluck('rt_name', 'id');
        $provinsi_id1 = Provinces::all()->pluck('name', 'id');
        $kota_id1 = Kabupaten::all()->pluck('name', 'id');
        $kecamatan_id1 = Kecamatan::all()->pluck('kec_name', 'id');
        $kelurahan_id1 = Kelurahan::all()->pluck('kel_name', 'id');
        $rw_id1 = Rw::all()->pluck('rw_name', 'id');

        return view('admin.history_warga.edit', compact('history_warga', 'history_category', 'warga_ids', 'rts', 'userLogin', 
        'rt_id', 
        'provinsi_id', 
        'kota_id', 
        'kecamatan_id', 
        'kelurahan_id', 
        'rw_id',
        'rt_id1', 
        'provinsi_id1', 
        'kota_id1', 
        'kecamatan_id1', 
        'kelurahan_id1', 
        'rw_id1'));
    }

    public function update(UpdateHistoryWargaRequest $request, History_Warga $history_warga)
    {

        abort_unless(\Gate::allows('history_warga_edit'), 403);

        $history_warga->update($request->all());

        return redirect()->route('admin.history_warga.index');
    }

    public function show(History_Warga $history_warga)
    {
        abort_unless(\Gate::allows('history_warga_show'), 403);

        return view('admin.history_warga.show', compact('history_warga'));
    }

    public function destroy(History_Warga $history_warga)
    {
        abort_unless(\Gate::allows('history_warga_delete'), 403);

        $history_warga->delete();

        return back();
    }

    public function massDestroy(MassDestroyHistoryWargaRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
