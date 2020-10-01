<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySdmCategoryRequest;
use App\Http\Requests\StoreSdmCategoryRequest;
use App\Http\Requests\UpdateSdmCategoryRequest;
use App\View_Warga_Salary;
use App\Sdm_Category;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // abort_unless(\Gate::allows('sdm_category_access'), 403);

        $viewWargaSalary = DB::select("SELECT (((warga.warga_first_name)::text || ' '::text) || (warga.warga_last_name)::text) AS nama_warga,
        warga.warga_address,
        ((salary.salary_start || '-'::text) || salary.salary_end) AS salary_range
       FROM (warga
         JOIN salary ON ((warga.warga_salary_range = salary.id)))");

        return view('admin.report_data_masyarakat_km.index', compact('viewWargaSalary'));
    }

    
}
