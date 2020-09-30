<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySdmCategoryRequest;
use App\Http\Requests\StoreSdmCategoryRequest;
use App\Http\Requests\UpdateSdmCategoryRequest;
use App\Sdm_Category;

class ReportController extends Controller
{
    public function index()
    {
        // abort_unless(\Gate::allows('sdm_category_access'), 403);
        $listReportDMKM = [];
        // $obj = array(
        //     'id' => 1,
        // 'nama_kepala_keluarga' => "Bagus Suhendriatno",
        // 'nama_anggota_keluarga' => "Bagus junior",
        // 'alamat' => "planet Mars",
        // 'jenis_jaminan_sosial' => "Bpjs",
        // 'keterangan' => "Tidak punya keterangan",
        // );
        
        // array_push($listReportDMKM,$obj);
        // $sdm_category = Sdm_Category::all();

        return view('admin.report_data_masyarakat_km.index', compact('listReportDMKM'));
    }

    
}
