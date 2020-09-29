<?php

namespace App\Http\Requests;

use App\Keuangan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyKeuanganRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('keuangan_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:keuangan,id',
        ];
    }
}
