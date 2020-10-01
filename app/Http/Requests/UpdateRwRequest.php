<?php

namespace App\Http\Requests;

use App\Rw;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRwRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('rw_edit');
    }

    public function rules()
    {
        return [
            'rw_name' => [
                'required',
            ],
            'rw_code' => [
                'required',
            ],
            'rw_kel_id' => [
                'required',
            ],
            'rw_status' => [
                'required',
            ],
        ];
    }
}
