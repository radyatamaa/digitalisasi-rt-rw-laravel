<?php

namespace App\Http\Requests;

use App\Master_Pekerjaan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyMasterPekerjaanRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('master_pekerjaan_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:master_pekerjaan,id',
        ];
    }
}
