<?php

namespace App\Http\Requests;

use App\Sekolah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroySekolahRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('sekolah_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sekolah,id',
        ];
    }
}
