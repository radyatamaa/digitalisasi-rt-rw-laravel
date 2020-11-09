<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Event_Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySdmCategoryRequest;
use App\Http\Requests\StoreSdmCategoryRequest;
use App\Http\Requests\UpdateSdmCategoryRequest;
use App\View_Warga_Salary;
use App\Rt;
use App\Keuangan;
use App\Keuangan_Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        // abort_unless(\Gate::allows('sdm_category_access'), 403);
        if (isset($_GET['report_event'])) {
            return $this->ReportEvent();
        } else if (isset($_GET['report_keuangan'])) {
            return $this->reportKeuangan();
        } else if (isset($_GET['report_pergerakan_warga'])) {
            return $this->reportpergerakanwarga();
        } else {
            $viewWargaSalary = DB::select("SELECT (((warga.warga_first_name)::text || ' '::text) || (warga.warga_last_name)::text) AS nama_warga,
            warga.warga_address,
            ((salary.salary_start || '-'::text) || salary.salary_end) AS salary_range
           FROM (warga
             JOIN salary ON ((warga.warga_salary_range = salary.id)))");

            return view('admin.report_data_masyarakat_km.index', compact('viewWargaSalary'));
        }
    }

    public function reportKeuangan()
    {
        $tahun = '';
        $bulan = '';
        $category = '';
        $userLogin = Auth::user()->user_fullname;
        $user = Auth::user()->rt_id;
        if ($user != null) {
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
                ->where('keuangan_rt', $user)
                ->get();
        } else {
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
        }
        $keuangan_categorys = Keuangan_Category::where('id_rt', $user)->pluck('category_name', 'id');

        if (isset($_POST['category'])) {
            if ($_POST['category'] != '') {
                $category = $_POST['category'];
                if ($user != null) {
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
                        ->where('keuangan_rt', $user)
                        ->where('keuangan.keuangan_category', '=', $_POST['category'])
                        ->get();
                } else {
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
                        ->where('keuangan.keuangan_category', '=', $_POST['category'])
                        ->get();
                }
            }
        }

        if (isset($_POST['bulan']) && isset($_POST['tahun'])) {
            if ($_POST['bulan'] != '' && $_POST['tahun'] != '') {
                $tahun = $_POST['tahun'];
                $bulan = $_POST['bulan'];
                $period =  $_POST['tahun'] . '-' . $_POST['bulan'];
                if ($user != null) {
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
                        ->where('keuangan_rt', $user)
                        ->whereMonth('keuangan.keuangan_periode', '=', $_POST['bulan'])
                        ->whereYear('keuangan.keuangan_periode', '=',  $_POST['tahun'])
                        ->get();
                } else {
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
                        ->whereMonth('keuangan.keuangan_periode', '=', $_POST['bulan'])
                        ->whereYear('keuangan.keuangan_periode', '=',  $_POST['tahun'])
                        ->get();
                }
            }
        }

        if (isset($_POST['bulan']) && isset($_POST['tahun']) && isset($_POST['category'])) {
            if ($_POST['bulan'] != '' && $_POST['tahun'] != '' && $_POST['category']) {
                $category = $_POST['category'];
                $tahun = $_POST['tahun'];
                $bulan = $_POST['bulan'];
                $period =  $_POST['tahun'] . '-' . $_POST['bulan'];
                if ($user != null) {
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
                        ->whereMonth('keuangan.keuangan_periode', '=', $_POST['bulan'])
                        ->whereYear('keuangan.keuangan_periode', '=',  $_POST['tahun'])
                        ->where('keuangan.keuangan_category', '=', $_POST['category'])
                        ->where('keuangan_rt', $user)
                        ->get();
                } else {
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
                        ->whereMonth('keuangan.keuangan_periode', '=', $_POST['bulan'])
                        ->whereYear('keuangan.keuangan_periode', '=',  $_POST['tahun'])
                        ->where('keuangan.keuangan_category', '=', $_POST['category'])
                        ->get();
                }
            }
        }


        return view('admin.report_keuangan.index', compact('keuangans', 'userLogin', 'keuangan_categorys', 'user', 'tahun', 'bulan', 'category'));
    }
    public function ReportEvent()
    {
        $category = '';
        $start_date = '';
        $end_date = '';
        $userLogin = Auth::user()->user_fullname;
        $user = Auth::user()->rt_id;
        if ($user != null) {
            $events = Event::select(
                'warga.warga_first_name',
                'warga.warga_last_name',
                'address_code.address_code_name',
                'event.event_date',
                'event.event_name',
                'event_category.category_name'
            )
                ->join('event_detail', 'event.id', '=', 'event_detail.event_id')
                ->join('warga', 'event_detail.event_warga', '=', 'warga.id')
                ->join('address_code', 'warga.warga_address_code', '=', 'address_code.id')
                ->join('event_category', 'event.event_category', '=', 'event_category.id')
                ->where('event_detail.deleted_at', '=', null)
                ->where('event_rt', $user)
                ->get();
        } else {
            $events = Event::select(
                'warga.warga_first_name',
                'warga.warga_last_name',
                'address_code.address_code_name',
                'event.event_date',
                'event.event_name',
                'event_category.category_name'
            )
                ->join('event_detail', 'event.id', '=', 'event_detail.event_id')
                ->join('warga', 'event_detail.event_warga', '=', 'warga.id')
                ->join('address_code', 'warga.warga_address_code', '=', 'address_code.id')
                ->join('event_category', 'event.event_category', '=', 'event_category.id')
                ->where('event_detail.deleted_at', '=', null)
                ->get();
        }

        $event_category = Event_Category::where('id_rt', $user)->pluck('category_name', 'id');

        if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
            if ($_POST['start_date'] != '' && $_POST['end_date'] != '') {
                $start_date =  $_POST['start_date'];
                $end_date =  $_POST['end_date'];
                if ($user != null) {
                    $events = Event::select(
                        'warga.warga_first_name',
                        'warga.warga_last_name',
                        'address_code.address_code_name',
                        'event.event_date',
                        'event.event_name',
                        'event_category.category_name'
                    )
                        ->join('event_detail', 'event.id', '=', 'event_detail.event_id')
                        ->join('warga', 'event_detail.event_warga', '=', 'warga.id')
                        ->join('address_code', 'warga.warga_address_code', '=', 'address_code.id')
                        ->join('event_category', 'event.event_category', '=', 'event_category.id')
                        ->where('event_detail.deleted_at', '=', null)
                        ->where('event.event_date', '>=',  $_POST['start_date'])
                        ->where('event.event_date', '<=', $_POST['end_date'])
                        ->where('event_rt', $user)
                        ->get();
                } else {
                    $events = Event::select(
                        'warga.warga_first_name',
                        'warga.warga_last_name',
                        'address_code.address_code_name',
                        'event.event_date',
                        'event.event_name',
                        'event_category.category_name'
                    )
                        ->join('event_detail', 'event.id', '=', 'event_detail.event_id')
                        ->join('warga', 'event_detail.event_warga', '=', 'warga.id')
                        ->join('address_code', 'warga.warga_address_code', '=', 'address_code.id')
                        ->join('event_category', 'event.event_category', '=', 'event_category.id')
                        ->where('event_detail.deleted_at', '=', null)
                        ->where('event.event_date', '>=',  $_POST['start_date'])
                        ->where('event.event_date', '<=', $_POST['end_date'])
                        ->get();
                }
            }
        }

        if (isset($_POST['category'])) {
            if ($_POST['category'] != '') {
                $category = $_POST['category'];
                if ($user != null) {
                    $events = Event::select(
                        'warga.warga_first_name',
                        'warga.warga_last_name',
                        'address_code.address_code_name',
                        'event.event_date',
                        'event.event_name',
                        'event_category.category_name'
                    )
                        ->join('event_detail', 'event.id', '=', 'event_detail.event_id')
                        ->join('warga', 'event_detail.event_warga', '=', 'warga.id')
                        ->join('address_code', 'warga.warga_address_code', '=', 'address_code.id')
                        ->join('event_category', 'event.event_category', '=', 'event_category.id')
                        ->where('event_detail.deleted_at', '=', null)
                        ->where('event.event_category', '=', $_POST['category'])
                        ->where('event_rt', $user)
                        ->get();
                } else {
                    $events = Event::select(
                        'warga.warga_first_name',
                        'warga.warga_last_name',
                        'address_code.address_code_name',
                        'event.event_date',
                        'event.event_name',
                        'event_category.category_name'
                    )
                        ->join('event_detail', 'event.id', '=', 'event_detail.event_id')
                        ->join('warga', 'event_detail.event_warga', '=', 'warga.id')
                        ->join('address_code', 'warga.warga_address_code', '=', 'address_code.id')
                        ->join('event_category', 'event.event_category', '=', 'event_category.id')
                        ->where('event_detail.deleted_at', '=', null)
                        ->where('event.event_category', '=', $_POST['category'])
                        ->get();
                }
            }
        }

        if (isset($_POST['category']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {
            if ($_POST['category'] != '' && $_POST['start_date'] != '' && $_POST['end_date'] != '') {
                $start_date =  $_POST['start_date'];
                $end_date =  $_POST['end_date'];
                $category = $_POST['category'];
                if ($user != null) {
                    $events = Event::select(
                        'warga.warga_first_name',
                        'warga.warga_last_name',
                        'address_code.address_code_name',
                        'event.event_date',
                        'event.event_name',
                        'event_category.category_name'
                    )
                        ->join('event_detail', 'event.id', '=', 'event_detail.event_id')
                        ->join('warga', 'event_detail.event_warga', '=', 'warga.id')
                        ->join('address_code', 'warga.warga_address_code', '=', 'address_code.id')
                        ->join('event_category', 'event.event_category', '=', 'event_category.id')
                        ->where('event_detail.deleted_at', '=', null)
                        ->where('event.event_category', '=', $_POST['category'])
                        ->where('event.event_date', '>=',  $_POST['start_date'])
                        ->where('event.event_date', '<=', $_POST['end_date'])
                        ->where('event_rt', $user)
                        ->get();
                } else {
                    $events = Event::select(
                        'warga.warga_first_name',
                        'warga.warga_last_name',
                        'address_code.address_code_name',
                        'event.event_date',
                        'event.event_name',
                        'event_category.category_name'
                    )
                        ->join('event_detail', 'event.id', '=', 'event_detail.event_id')
                        ->join('warga', 'event_detail.event_warga', '=', 'warga.id')
                        ->join('address_code', 'warga.warga_address_code', '=', 'address_code.id')
                        ->join('event_category', 'event.event_category', '=', 'event_category.id')
                        ->where('event_detail.deleted_at', '=', null)
                        ->where('event.event_category', '=', $_POST['category'])
                        ->where('event.event_date', '>=',  $_POST['start_date'])
                        ->where('event.event_date', '<=', $_POST['end_date'])
                        ->get();
                }
            }
        }

        // $events
        return view('admin.report_event.index', compact('events', 'userLogin', 'event_category', 'user', 'category', 'start_date', 'end_date'));
    }

    public function reportpergerakanwarga()
    {

        $userLogin = Auth::user()->user_fullname;
        $rt = Auth::user()->rt_id;
        if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
            if ($_POST['start_date'] != '' && $_POST['end_date'] != '') {
                $start_date =  date('Y/m/d', strtotime($_POST['start_date']));
                $end_date =  date('Y/m/d', strtotime($_POST['end_date']));
            } else {
                $start_date =  date("Y/m/d");
                $end_date = date("Y/m/d");
            }
        } else {
            $start_date =  date("Y/m/d");
            $end_date =  date("Y/m/d");
        }

        $query = "SELECT RT_NAME AS RT, MAX(WARGA_NO_KK) AS KK_AWAL_BULAN_INI, MAX(LAKI_PENDUDUK_AWAL_BULAN_INI) AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
        MAX(PEREMPUAN_PENDUDUK_AWAL_BULAN_INI) AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, MAX(JML_PENDUDUK_AWAL_BULAN_INI) AS JML_PENDUDUK_AWAL_BULAN_INI,
        MAX(LAKI_LAHIR_BULAN_INI) AS LAKI_LAHIR_BULAN_INI, MAX(PEREMPUAN_LAHIR_BULAN_INI) AS PEREMPUAN_LAHIR_BULAN_INI, MAX(JML_LAHIR_BULAN_INI) AS JML_LAHIR_BULAN_INI,
        MAX(LAKI_MENINGGAL_BULAN_INI) AS LAKI_MENINGGAL_BULAN_INI, MAX(PEREMPUAN_MENINGGAL_BULAN_INI) AS PEREMPUAN_MENINGGAL_BULAN_INI, MAX(JML_MENINGGAL_BULAN_INI) AS JML_MENINGGAL_BULAN_INI,
        MAX(LAKI_PENDATANG_BULAN_INI) AS LAKI_PENDATANG_BULAN_INI, MAX(PEREMPUAN_PENDATANG_BULAN_INI) AS PEREMPUAN_PENDATANG_BULAN_INI, MAX(JML_PENDATANG_BULAN_INI) AS JML_PENDATANG_BULAN_INI,
        MAX(LAKI_PINDAH_BULAN_INI) AS LAKI_PINDAH_BULAN_INI, MAX(PEREMPUAN_PINDAH_BULAN_INI) AS PEREMPUAN_PINDAH_BULAN_INI, MAX(JML_PINDAH_BULAN_INI) AS JML_PINDAH_INI,
        MAX(LAKI_AKHIR_BULAN_BULAN_INI) AS LAKI_AKHIR_BULAN_BULAN_INI, MAX(PEREMPUAN_AKHIR_BULAN_BULAN_INI) AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, MAX(JML_AKHIR_BULAN_BULAN_INI) AS JML_AKHIR_BULAN_BULAN_INI,
        MAX(KK_AKHIR_BULAN_INI) AS KK_AKHIR_BULAN_INI
 FROM(
     SELECT RT_NAME, COUNT(WARGA_NO_KK) WARGA_NO_KK, 0 LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS JML_PENDUDUK_AWAL_BULAN_INI,
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM(
         SELECT RT_NAME, COUNT(WARGA_NO_KK) WARGA_NO_KK
         FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
         WHERE WARGA_JOIN_DATE <= '$start_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
         GROUP BY RT_NAME, WARGA.WARGA_NO_KK
         ) AS A
     GROUP BY RT_NAME
     
     UNION
     
     SELECT RT_NAME, 0 AS WARGA_NO_KK, COUNT(B.ID) AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            COUNT(C.ID) AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, COUNT(WARGA.ID) AS JML_PENDUDUK_AWAL_BULAN_INI,
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_JOIN_DATE <= '$start_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     
     UNION
     
     SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS JML_PENDUDUK_AWAL_BULAN_INI, 
            COUNT(B.ID) AS LAKI_LAHIR_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_LAHIR_BULAN_INI, COUNT(WARGA.ID) AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_BIRTH_DATE >= '$start_date'::DATE AND WARGA_BIRTH_DATE <= '$end_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     
     UNION
     
     SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS WARGA_NO_KTP, 
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            COUNT(B.ID) AS LAKI_MENINGGAL_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_MENINGGAL_BULAN_INI, COUNT(WARGA.ID) AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_MENINGGAL_DATE >= '$start_date'::DATE AND WARGA_MENINGGAL_DATE <= '$end_date'::DATE and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     UNION
     SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS WARGA_NO_KTP, 
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            COUNT(B.ID) AS LAKI_PENDATANG_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_PENDATANG_BULAN_INI, COUNT(WARGA.ID) AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_JOIN_DATE >= '$start_date'::DATE AND WARGA_JOIN_DATE <= '$end_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     UNION
     SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS WARGA_NO_KTP, 
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            COUNT(B.ID) AS LAKI_PINDAH_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_PINDAH_BULAN_INI, COUNT(WARGA.ID) AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             INNER JOIN HISTORY_WARGA ON WARGA.ID = HISTORY_WARGA.WARGA_ID
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE HISTORY_DATE >= '$start_date'::DATE AND HISTORY_DATE <= '$end_date'::DATE AND HISTORY_CATEGORY = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     UNION
         SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS WARGA_NO_KTP, 
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            COUNT(B.ID) AS LAKI_AKHIR_BULAN_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, COUNT(WARGA.ID) AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_JOIN_DATE <= '$start_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     
     UNION
     
     SELECT RT_NAME, 0 WARGA_NO_KK, 0 LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS JML_PENDUDUK_AWAL_BULAN_INI,
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            COUNT(KK_AKHIR_BULAN_INI) AS KK_AKHIR_BULAN_INI
     FROM(
         SELECT RT_NAME, COUNT(WARGA_NO_KK) KK_AKHIR_BULAN_INI
         FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
         WHERE WARGA_JOIN_DATE <= '$start_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
         GROUP BY RT_NAME, WARGA.WARGA_NO_KK
         ) AS A
     GROUP BY RT_NAME
     ) AS FIX
 GROUP BY RT_NAME";
        $ViewPergerakanWarga = DB::select("SELECT RT_NAME AS RT, MAX(WARGA_NO_KK) AS KK_AWAL_BULAN_INI, MAX(LAKI_PENDUDUK_AWAL_BULAN_INI) AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
        MAX(PEREMPUAN_PENDUDUK_AWAL_BULAN_INI) AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, MAX(JML_PENDUDUK_AWAL_BULAN_INI) AS JML_PENDUDUK_AWAL_BULAN_INI,
        MAX(LAKI_LAHIR_BULAN_INI) AS LAKI_LAHIR_BULAN_INI, MAX(PEREMPUAN_LAHIR_BULAN_INI) AS PEREMPUAN_LAHIR_BULAN_INI, MAX(JML_LAHIR_BULAN_INI) AS JML_LAHIR_BULAN_INI,
        MAX(LAKI_MENINGGAL_BULAN_INI) AS LAKI_MENINGGAL_BULAN_INI, MAX(PEREMPUAN_MENINGGAL_BULAN_INI) AS PEREMPUAN_MENINGGAL_BULAN_INI, MAX(JML_MENINGGAL_BULAN_INI) AS JML_MENINGGAL_BULAN_INI,
        MAX(LAKI_PENDATANG_BULAN_INI) AS LAKI_PENDATANG_BULAN_INI, MAX(PEREMPUAN_PENDATANG_BULAN_INI) AS PEREMPUAN_PENDATANG_BULAN_INI, MAX(JML_PENDATANG_BULAN_INI) AS JML_PENDATANG_BULAN_INI,
        MAX(LAKI_PINDAH_BULAN_INI) AS LAKI_PINDAH_BULAN_INI, MAX(PEREMPUAN_PINDAH_BULAN_INI) AS PEREMPUAN_PINDAH_BULAN_INI, MAX(JML_PINDAH_BULAN_INI) AS JML_PINDAH_INI,
        MAX(LAKI_AKHIR_BULAN_BULAN_INI) AS LAKI_AKHIR_BULAN_BULAN_INI, MAX(PEREMPUAN_AKHIR_BULAN_BULAN_INI) AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, MAX(JML_AKHIR_BULAN_BULAN_INI) AS JML_AKHIR_BULAN_BULAN_INI,
        MAX(KK_AKHIR_BULAN_INI) AS KK_AKHIR_BULAN_INI
 FROM(
     SELECT RT_NAME, COUNT(WARGA_NO_KK) WARGA_NO_KK, 0 LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS JML_PENDUDUK_AWAL_BULAN_INI,
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM(
         SELECT RT_NAME, COUNT(WARGA_NO_KK) WARGA_NO_KK
         FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
         WHERE WARGA_JOIN_DATE <= '$start_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
         GROUP BY RT_NAME, WARGA.WARGA_NO_KK
         ) AS A
     GROUP BY RT_NAME
     
     UNION
     
     SELECT RT_NAME, 0 AS WARGA_NO_KK, COUNT(B.ID) AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            COUNT(C.ID) AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, COUNT(WARGA.ID) AS JML_PENDUDUK_AWAL_BULAN_INI,
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_JOIN_DATE <= '$start_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     
     UNION
     
     SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS JML_PENDUDUK_AWAL_BULAN_INI, 
            COUNT(B.ID) AS LAKI_LAHIR_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_LAHIR_BULAN_INI, COUNT(WARGA.ID) AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_BIRTH_DATE >= '$start_date'::DATE AND WARGA_BIRTH_DATE <= '$end_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     
     UNION
     
     SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS WARGA_NO_KTP, 
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            COUNT(B.ID) AS LAKI_MENINGGAL_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_MENINGGAL_BULAN_INI, COUNT(WARGA.ID) AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_MENINGGAL_DATE >= '$start_date'::DATE AND WARGA_MENINGGAL_DATE <= '$end_date'::DATE and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     UNION
     SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS WARGA_NO_KTP, 
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            COUNT(B.ID) AS LAKI_PENDATANG_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_PENDATANG_BULAN_INI, COUNT(WARGA.ID) AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_JOIN_DATE >= '$start_date'::DATE AND WARGA_JOIN_DATE <= '$end_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     UNION
     SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS WARGA_NO_KTP, 
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            COUNT(B.ID) AS LAKI_PINDAH_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_PINDAH_BULAN_INI, COUNT(WARGA.ID) AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             INNER JOIN HISTORY_WARGA ON WARGA.ID = HISTORY_WARGA.WARGA_ID
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE HISTORY_DATE >= '$start_date'::DATE AND HISTORY_DATE <= '$end_date'::DATE AND HISTORY_CATEGORY = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     UNION
         SELECT RT_NAME, 0 AS WARGA_NO_KK, 0 AS LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 AS PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS WARGA_NO_KTP, 
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            COUNT(B.ID) AS LAKI_AKHIR_BULAN_BULAN_INI, COUNT(C.ID) AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, COUNT(WARGA.ID) AS JML_AKHIR_BULAN_BULAN_INI,
            0 AS KK_AKHIR_BULAN_INI
     FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '1') B ON WARGA.ID = B.ID 
             LEFT OUTER JOIN (SELECT ID, WARGA_SEX FROM WARGA WHERE WARGA_SEX = '2') C ON WARGA.ID = C.ID 
     WHERE WARGA_JOIN_DATE <= '$start_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
     GROUP BY RT_NAME
     
     UNION
     
     SELECT RT_NAME, 0 WARGA_NO_KK, 0 LAKI_PENDUDUK_AWAL_BULAN_INI, 
            0 PEREMPUAN_PENDUDUK_AWAL_BULAN_INI, 0 AS JML_PENDUDUK_AWAL_BULAN_INI,
            0 AS LAKI_LAHIR_BULAN_INI, 0 AS PEREMPUAN_LAHIR_BULAN_INI, 0 AS JML_LAHIR_BULAN_INI,
            0 AS LAKI_MENINGGAL_BULAN_INI, 0 AS PEREMPUAN_MENINGGAL_BULAN_INI, 0 AS JML_MENINGGAL_BULAN_INI,
            0 AS LAKI_PENDATANG_BULAN_INI, 0 AS PEREMPUAN_PENDATANG_BULAN_INI, 0 AS JML_PENDATANG_BULAN_INI,
            0 AS LAKI_PINDAH_BULAN_INI, 0 AS PEREMPUAN_PINDAH_BULAN_INI, 0 AS JML_PINDAH_BULAN_INI,
            0 AS LAKI_AKHIR_BULAN_BULAN_INI, 0 AS PEREMPUAN_AKHIR_BULAN_BULAN_INI, 0 AS JML_AKHIR_BULAN_BULAN_INI,
            COUNT(KK_AKHIR_BULAN_INI) AS KK_AKHIR_BULAN_INI
     FROM(
         SELECT RT_NAME, COUNT(WARGA_NO_KK) KK_AKHIR_BULAN_INI
         FROM RT INNER JOIN WARGA ON RT.ID = WARGA.WARGA_RT
         WHERE WARGA_JOIN_DATE <= '$start_date'::DATE AND WARGA.WARGA_STATUS = '1' and WARGA_RT = '$rt'
         GROUP BY RT_NAME, WARGA.WARGA_NO_KK
         ) AS A
     GROUP BY RT_NAME
     ) AS FIX
 GROUP BY RT_NAME");

        return view('admin.report_pergerakan_warga.index', compact('userLogin', 'ViewPergerakanWarga', 'rt', 'start_date', 'end_date'));
    }

    public function store()
    {
        // abort_unless(\Gate::allows('sdm_category_access'), 403);
        if (isset($_GET['report_event'])) {
            return $this->ReportEvent();
        }
        if (isset($_GET['report_keuangan'])) {
            return $this->reportKeuangan();
        }
        if (isset($_GET['report_pergerakan_warga'])) {
            return $this->reportpergerakanwarga();
        } else {
            $viewWargaSalary = DB::select("SELECT (((warga.warga_first_name)::text || ' '::text) || (warga.warga_last_name)::text) AS nama_warga,
            warga.warga_address,
            ((salary.salary_start || '-'::text) || salary.salary_end) AS salary_range
           FROM (warga
             JOIN salary ON ((warga.warga_salary_range = salary.id)))");

            return view('admin.report_data_masyarakat_km.index', compact('viewWargaSalary'));
        }
    }
}
