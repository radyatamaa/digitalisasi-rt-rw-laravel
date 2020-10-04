<?php

namespace App\Http\Requests;

use App\Pendidikan;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePendidikanRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('pendidikan_edit');
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
