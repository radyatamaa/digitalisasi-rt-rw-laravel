<?php

namespace App\Http\Requests;

use App\History_Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHistoryCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('history_category_edit');
    }

    public function rules()
    {
        return [
            'category_name' => [
                'required',
            ],
        ];
    }
}
