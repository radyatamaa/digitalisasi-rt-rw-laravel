<?php

namespace App\Http\Requests;

use App\Pendidikan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPendidikanRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('pendidikan_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pendidikan,id',
        ];
    }
}
