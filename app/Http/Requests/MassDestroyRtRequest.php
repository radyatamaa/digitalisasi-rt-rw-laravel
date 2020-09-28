<?php

namespace App\Http\Requests;

use App\Rt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRtRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('rt_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:history_warga,id',
        ];
    }
}
