<?php

namespace App\Http\Requests;

use App\Sdm_Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyMasterGajiRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('master_gaji_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:master_agama,id',
        ];
    }
}
