<?php

namespace App\Http\Requests;

use App\Rt;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRtRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('rt_edit');
    }

    public function rules()
    {
        return [
            'rt_name' => [
                'required',
            ],
            'rt_code' => [
                'required',
            ],
            'rt_rw_id' => [
                'required',
            ],
            'rt_status' => [
                'required',
            ],
        ];
    }
}
