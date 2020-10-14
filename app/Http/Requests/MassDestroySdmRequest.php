<?php

namespace App\Http\Requests;

use App\Sdm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroySdmRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('sdm_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sdm,id',
        ];
    }
}
