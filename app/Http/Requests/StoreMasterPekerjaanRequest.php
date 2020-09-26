<?php

namespace App\Http\Requests;

use App\Master_Pekerjaan;
use Illuminate\Foundation\Http\FormRequest;

class StoreMasterPekerjaanRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('master_pekerjaan_create');
    }

    public function rules()
    {
        return [
            'job_name' => [
                'required',
            ],
        ];
    }
}
