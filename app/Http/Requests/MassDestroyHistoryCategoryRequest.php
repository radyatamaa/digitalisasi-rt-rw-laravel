<?php

namespace App\Http\Requests;

use App\History_Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyHistoryCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('history_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:history_category,id',
        ];
    }
}
