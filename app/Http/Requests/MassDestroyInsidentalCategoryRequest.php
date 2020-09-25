<?php

namespace App\Http\Requests;

use App\Insidental_Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyInsidentalCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('insidental_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:insidental_category,id',
        ];
    }
}
