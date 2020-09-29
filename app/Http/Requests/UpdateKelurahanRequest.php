<?php

namespace App\Http\Requests;

use App\Kelurahan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKelurahanRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('kelurahan_edit');
    }

    public function rules()
    {
        return [
            'kel_name' => [
                'required',
            ],
            'kel_code' => [
                'required',
            ],
            'kel_kec_id' => [
                'required',
            ],
            'kel_status' => [
                'required',
            ],
        ];
    }
}
