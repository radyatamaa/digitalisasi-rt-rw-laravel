<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Master_Agama;
use App\Warga;
use App\master_pekerjaan;
use App\Rt;
use App\Rw;
use App\Kelurahan;
use \stdClass;
use App\Event_Category; 
use App\Event; 
class HomeController
{
    public function index()
    {
        $rw = Auth::user()->rw_id;
        $kelurahan_id = Auth::user()->kelurahan_id;
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

        $rtArray = [];
        $rwArray = [];

    if($rw != null){
        $rtList = Rt::where('rt_rw_id',$rw)->get();   
        $rwFirst = Rw::where('id',$rw)->get();
        foreach($rtList as $index => $rtobj){

            $datartObj = new \stdClass();
            $datartObj->id = $rtobj->id;
            $datartObj->rw_id = $rwFirst[0]->id;
            $datartObj->rt_name = $rtobj->rt_name;    
            $datartObj->rw_name = $rwFirst[0]->rw_name;
            $lakiLakiCount = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
            ->where('warga.warga_sex', '1')
            ->where('warga.warga_rt', $datartObj->id)
            ->count();
            $perempuanCount = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
            ->where('warga.warga_sex', '2')
            ->where('warga.warga_rt', $datartObj->id)
            ->count();
            $wargaBerdomisiliCount = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
            ->where('warga.warga_is_ktp_sama_domisili', '1')
            ->where('warga.warga_rt', $datartObj->id)
            ->count();
            $wargaNonBerdomisiliCount = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
            ->join('rt', 'rt.id', '=', 'warga.warga_rt')
            ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
            ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
            ->join('job', 'job.id', '=', 'warga.warga_job')
            ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
            ->where('warga.warga_is_ktp_sama_domisili', '2')
            ->where('warga.warga_rt', $datartObj->id)
            ->count();

            $eventCategoryList = Event_Category::where('id_rt', $datartObj->id)
            ->where('is_dashboard', 1)
            ->get();

            $eventCategorys = [];
            foreach($eventCategoryList as $i => $eventCategori){
                $eventCategory = new \stdClass();
                $eventCategory->categoryName = $eventCategori->category_name;
                $eventCategory->category_id = $eventCategori->id;

                $eventWargaCountikut = Event::select('warga.id')
                ->distinct()
                ->join('event_detail', 'event_detail.event_id', '=', 'event.id')
                ->join('warga', 'warga.id', '=', 'event_detail.event_warga')
                ->join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_rt', $datartObj->id)
                ->where('event.event_category', $eventCategory->category_id)
                ->count();
                
                $totalWarga = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                    ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                    ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                    ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                    ->join('job', 'job.id', '=', 'warga.warga_job')
                    ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                    ->where('warga.warga_rt', $datartObj->id)
                    ->count();

                $eventWargaCountTidakIkut = $totalWarga - $eventWargaCountikut;
                $eventCategory->eventWargaCountTidakIkut = $eventWargaCountTidakIkut;
                $eventCategory->eventWargaCountikut = $eventWargaCountikut;
                array_push($eventCategorys,$eventCategory);
            }

            $datartObj->lakiLakiCount = $lakiLakiCount;
            $datartObj->perempuanCount = $perempuanCount;
            $datartObj->wargaBerdomisiliCount = $wargaBerdomisiliCount;
            $datartObj->wargaNonBerdomisiliCount = $wargaNonBerdomisiliCount;
            $datartObj->eventCategorys = $eventCategorys;

            array_push($rtArray,$datartObj);

        }

    }

    if($kelurahan_id != null){
            $rwList = Rw::where('rw_kel_id',$kelurahan_id)->get();
            $kelurahanFirst = Kelurahan::where('id',$kelurahan_id)->get();
            foreach($rwList as $index => $rwobj){
                $datarwObj = new \stdClass();
                $datarwObj->id = $rwobj->id;
                $datarwObj->rw_name = $rwobj->rw_name;
                $datarwObj->kel_id = $kelurahanFirst[0]->id;
                $datarwObj->kel_name = $kelurahanFirst[0]->kel_name;

                $lakiLakiCount = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('rw', 'rw.id', '=', 'rt.rt_rw_id')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_sex', '1')
                ->where('rw.id', $datarwObj->id)
                ->count();
                $perempuanCount = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('rw', 'rw.id', '=', 'rt.rt_rw_id')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_sex', '2')
                ->where('rw.id', $datarwObj->id)
                ->count();
                $wargaBerdomisiliCount = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('rw', 'rw.id', '=', 'rt.rt_rw_id')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_is_ktp_sama_domisili', '1')
                ->where('rw.id', $datarwObj->id)
                ->count();
                $wargaNonBerdomisiliCount = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('rw', 'rw.id', '=', 'rt.rt_rw_id')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_is_ktp_sama_domisili', '2')
                ->where('rw.id', $datarwObj->id)
                ->count();
                
                $eventCategoryList = Event_Category::where('id_rw', $datarwObj->id)
                ->where('is_dashboard', 1)
                ->get();
                $eventCategorys = [];
                foreach($eventCategoryList as $i => $eventCategori){
                    $eventCategory = new \stdClass();
                    $eventCategory->categoryName = $eventCategori->category_name;
                    $eventCategory->category_id = $eventCategori->id;
    
                    $eventWargaCountikut = Event::select('warga.id')
                    ->distinct()
                    ->join('event_detail', 'event_detail.event_id', '=', 'event.id')
                    ->join('warga', 'warga.id', '=', 'event_detail.event_warga')
                    ->join('religion', 'religion.id', '=', 'warga.warga_religion')
                    ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                    ->join('rw', 'rw.id', '=', 'rt.rt_rw_id')
                    ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                    ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                    ->join('job', 'job.id', '=', 'warga.warga_job')
                    ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                    ->where('rw.id', $datarwObj->id)
                    ->where('event.event_category', $eventCategory->category_id)
                    ->count();
                    
                    $totalWarga = Warga::join('religion', 'religion.id', '=', 'warga.warga_religion')
                        ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                        ->join('rw', 'rw.id', '=', 'rt.rt_rw_id')
                        ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                        ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                        ->join('job', 'job.id', '=', 'warga.warga_job')
                        ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                        ->where('rw.id', $datarwObj->id)
                        ->count();
    
                    $eventWargaCountTidakIkut = $totalWarga - $eventWargaCountikut;
                    $eventCategory->eventWargaCountTidakIkut = $eventWargaCountTidakIkut;
                    $eventCategory->eventWargaCountikut = $eventWargaCountikut;
                    array_push($eventCategorys,$eventCategory);
                }
               
                $datarwObj->lakiLakiCount = $lakiLakiCount;
                $datarwObj->perempuanCount = $perempuanCount;
                $datarwObj->wargaBerdomisiliCount = $wargaBerdomisiliCount;
                $datarwObj->wargaNonBerdomisiliCount = $wargaNonBerdomisiliCount;
                $datarwObj->eventCategorys = $eventCategorys;

                array_push($rwArray,$datarwObj);
        }
    }
        $user = Auth::user()->user_fullname;
        return view('home',compact('user','lakiLaki',
        'perempuan',
        'wargaBerdomisili',
        'wargaNonBerdomisili',
        'agamaArray',
        'pekerjaanArray',
        'rtArray',
        'rwArray'));
    }
}
