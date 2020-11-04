<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySdmCategoryRequest;
use App\Http\Requests\StoreSdmCategoryRequest;
use App\Http\Requests\UpdateSdmCategoryRequest;
use App\View_Warga_Salary;
use App\Sdm_Category;
use App\Keuangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        // abort_unless(\Gate::allows('sdm_category_access'), 403);
        if(isset($_GET['report_keuangan'])){
            return $this->reportKeuangan();
        }else{
            $viewWargaSalary = DB::select("SELECT (((warga.warga_first_name)::text || ' '::text) || (warga.warga_last_name)::text) AS nama_warga,
            warga.warga_address,
            ((salary.salary_start || '-'::text) || salary.salary_end) AS salary_range
           FROM (warga
             JOIN salary ON ((warga.warga_salary_range = salary.id)))");
    
            return view('admin.report_data_masyarakat_km.index', compact('viewWargaSalary'));
    
        }
    }

    public function reportKeuangan(){
        $userLogin = Auth::user()->user_fullname;
        $keuangans = Keuangan::select(
            'address_code.address_code_name',
            'keuangan.created_at',
            'keuangan.keuangan_periode',
            'keuangan_category.category_name',
            'keuangan.keuangan_value'
        )
            ->join('warga', 'warga.id', '=', 'keuangan.keuangan_warga_id')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('keuangan_category', 'keuangan_category.id', '=', 'keuangan.keuangan_category')
            ->get();

            return view('admin.report_keuangan.index', compact('keuangans','userLogin'));
    
    }

    
}
