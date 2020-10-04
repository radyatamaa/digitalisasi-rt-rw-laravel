<?php

namespace App\Http\Requests;

use App\Pendidikan;
use Illuminate\Foundation\Http\FormRequest;

class StorePendidikanRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('pendidikan_create');
    }

    public function rules()
    {
        return [
            'pendidikan_name' => [
                'required',
            ],
        ];
    }
}
