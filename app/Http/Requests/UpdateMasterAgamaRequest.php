<?php

namespace App\Http\Requests;

use App\Master_Agama;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMasterAgamaRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('master_agama_edit');
    }

    public function rules()
    {
        return [
            'religion_name' => [
                'required',
            ],
        ];
    }
}
