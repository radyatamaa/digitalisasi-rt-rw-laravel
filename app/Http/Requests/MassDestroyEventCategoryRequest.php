<?php

namespace App\Http\Requests;

use App\Event_Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyEventCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('event_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:event_category,id',
        ];
    }
}
