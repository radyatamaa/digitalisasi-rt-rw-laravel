<?php

namespace App\Http\Requests;

use App\Sdm;
use Illuminate\Foundation\Http\FormRequest;

class StoreSdmRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('sdm_create');
    }

    public function rules()
    {
        return [
            'sdm_fullname' => [
                'required',
            ],
            'sdm_no_ktp' => [
                'required',
            ],
            'sdm_phone' => [
                'required',
            ],
            'sdm_join_date' => [
                'required',
            ],
            'sdm_category' => [
                'required',
            ],
            
        ];
    }
}
