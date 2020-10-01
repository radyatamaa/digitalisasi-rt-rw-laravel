<?php

namespace App\Http\Requests;

use App\Wilayah;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWilayahRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('wilayah_edit');
    }

    public function rules()
    {
        return [
            'wilayah_name' => [
                'required',
            ],
        ];
    }
}
