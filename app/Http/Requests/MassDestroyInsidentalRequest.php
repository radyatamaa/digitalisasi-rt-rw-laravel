<?php

namespace App\Http\Requests;

use App\Insidental;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyInsidentalRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('insidental_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:insidental,id',
        ];
    }
}
