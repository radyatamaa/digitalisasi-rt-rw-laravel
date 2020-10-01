<?php

namespace App\Http\Requests;

use App\Wilayah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyWilayahRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('wilayah_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:wilayah,id',
        ];
    }
}
