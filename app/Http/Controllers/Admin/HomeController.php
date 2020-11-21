<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Master_Agama;
use App\Warga;
use App\master_pekerjaan;
use \stdClass;

class HomeController
{
    public function index()
    {
        $rw = Auth::user()->rw_id;
        $rt = Auth::user()->rt_id;
        $chartBackground = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];
        $agamaArray = [];
        $pekerjaanArray = [];
        $agamas = Master_Agama::all();        
        $pekerjaans = master_pekerjaan::all();

        $indexs = 0;
        foreach($agamas as $index => $agama){
            $dataObj = new \stdClass();
            $dataObj->nama_agama = $agama->religion_name;
            $dataObj->backgroundColor = $agama->color;     
            if ($rt != null) {
                $dataObj->count = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_religion', $agama->id)
                ->where('warga.warga_rt', $rt)
                ->count();
            
            }else{               
                $dataObj->count = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_religion', $agama->id)
                ->count();
            }
           
           
            if(($dataObj->count != 0)){   
                array_push($agamaArray,$dataObj);
                }
           
            
        }
        
        $indexs2 = 0;
        foreach($pekerjaans as $index => $pekerjaan){
            $dataObj = new \stdClass();
            $dataObj->nama_pekerjaan = $pekerjaan->job_name;
            $dataObj->backgroundColor = $pekerjaan->color;     
            if ($rt != null) {
                $dataObj->count = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_job', $pekerjaan->id)
                ->where('warga.warga_rt', $rt)
                ->count();
            
            }else{
                $dataObj->count = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_job', $pekerjaan->id)
                ->count();           
            }
            
            if(($dataObj->count != 0)){   
            array_push($pekerjaanArray,$dataObj);
            }
        }

        if ($rt != null) {
            $lakiLaki = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->where('warga.warga_sex', '1')
            ->where('warga.warga_rt', $rt)
            ->count();
            $perempuan = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->where('warga.warga_sex', '2')
            ->where('warga.warga_rt', $rt)
            ->count();
            $wargaBerdomisili = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->where('warga.warga_is_ktp_sama_domisili', '1')
            ->where('warga.warga_rt', $rt)
            ->count();
            $wargaNonBerdomisili = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->where('warga.warga_is_ktp_sama_domisili', '2')
            ->where('warga.warga_rt', $rt)
            ->count();
        }else{
            $lakiLaki = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->where('warga.warga_sex', '1')->count();
            $perempuan = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->where('warga.warga_sex', '2')->count();
            $wargaBerdomisili = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->where('warga.warga_is_ktp_sama_domisili', '1')->count();
            $wargaNonBerdomisili = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->where('warga.warga_is_ktp_sama_domisili', '2')->count();            
        }

      
        $user = Auth::user()->user_fullname;
        return view('home',compact('user','lakiLaki',
        'perempuan',
        'wargaBerdomisili',
        'wargaNonBerdomisili','agamaArray','pekerjaanArray'));
    }
}
