<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Event_Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySdmCategoryRequest;
use App\Http\Requests\StoreSdmCategoryRequest;
use App\Http\Requests\UpdateSdmCategoryRequest;
use App\View_Warga_Salary;
use App\Sdm_Category;
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
        }
        if (isset($_GET['report_keuangan'])) {
            return $this->reportKeuangan();
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
        $userLogin = Auth::user()->user_fullname;
        $user = Auth::user()->rt_id;
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
        $keuangan_categorys = Keuangan_Category::where('id_rt', $user)->pluck('category_name', 'id');

        if (isset($_POST['keuangan_category'])) {
            if ($_POST['keuangan_category'] != '') {
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
                    ->where('keuangan.keuangan_category', '=', $_POST['keuangan_category'])
                    ->get();
            }
        }

        if (isset($_POST['bulan']) && isset($_POST['tahun'])) {
            if ($_POST['bulan'] != '' && $_POST['tahun'] != '') {
                $tahun = $_POST['tahun'];
                $period =  $_POST['tahun'] . '-' . $_POST['bulan'];
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

        if (isset($_POST['bulan']) && isset($_POST['tahun']) && isset($_POST['keuangan_category'])) {
            if ($_POST['bulan'] != '' && $_POST['tahun'] != '' && $_POST['keuangan_category']) {

                $period =  $_POST['tahun'] . '-' . $_POST['bulan'];
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
                    ->where('keuangan.keuangan_category', '=', $_POST['keuangan_category'])
                    ->get();
            }
        }


        return view('admin.report_keuangan.index', compact('keuangans', 'userLogin', 'keuangan_categorys', 'user','tahun'));
    }
    public function ReportEvent()
    {
        $userLogin = Auth::user()->user_fullname;
        $user = Auth::user()->rt_id;
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
            ->where('event_detail.deleted_at', '=', null)->get();

        $event_category = Event_Category::where('id_rt', $user)->pluck('category_name', 'id');

        if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
            if ($_POST['start_date'] != '' && $_POST['end_date'] != '') {
                $start =  $_POST['start_date'];
                $end =  $_POST['end_date'];

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
                    ->where('event.event_date', '>=',  $start)
                    ->where('event.event_date', '<=', $end)
                    ->get();
            }
        }

        if (isset($_POST['event_category'])) {
            if ($_POST['event_category'] != '') {
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
                    ->where('event.event_category', '=', $_POST['event_category'])
                    ->get();
            }
        }

        if (isset($_POST['event_category']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {
            if ($_POST['event_category'] != '' && $_POST['start_date'] != '' && $_POST['end_date'] != '') {
                $start =  $_POST['start_date'];
                $end =  $_POST['end_date'];

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
                    ->where('event.event_category', '=', $_POST['event_category'])
                    ->where('event.event_date', '>=',  $start)
                    ->where('event.event_date', '<=', $end)
                    ->get();
            }
        }

        // $events
        return view('admin.report_event.index', compact('events', 'userLogin', 'event_category', 'user'));
    }

    public function store()
    {
        // abort_unless(\Gate::allows('sdm_category_access'), 403);
        if (isset($_GET['report_event'])) {
            return $this->ReportEvent();
        }
        if (isset($_GET['report_keuangan'])) {
            return $this->reportKeuangan();
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
