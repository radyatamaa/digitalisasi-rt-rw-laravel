<?php

namespace App\Http\Requests;

use App\Wilayah;
use Illuminate\Foundation\Http\FormRequest;

class StoreWilayahRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('wilayah_create');
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
