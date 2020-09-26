<?php

namespace App\Http\Requests;

use App\Master_Gaji;
use Illuminate\Foundation\Http\FormRequest;

class StoreMasterGajiRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('master_gaji_create');
    }

    public function rules()
    {
        return [
            'salary_start' => [
                'required',
            ],
            'salary_end' => [
                'required',
            ],
        ];
    }
}
