<?php

namespace App\Http\Requests;

use App\Keuangan_Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyKeuanganCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('keuangan_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:keuangan_category,id',
        ];
    }
}
