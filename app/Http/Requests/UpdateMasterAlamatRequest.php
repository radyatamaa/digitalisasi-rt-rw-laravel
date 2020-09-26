<?php

namespace App\Http\Requests;

use App\Master_Alamat;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMasterAlamatRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('master_alamat_edit');
    }

    public function rules()
    {
        return [
            'address_code_name' => [
                'required',
            ],
            'address_code_rt' => [
                'required',
            ],
        ];
    }
}
