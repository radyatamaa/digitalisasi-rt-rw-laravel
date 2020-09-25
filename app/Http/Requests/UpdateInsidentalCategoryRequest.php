<?php

namespace App\Http\Requests;

use App\Insidental_Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInsidentalCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('insidental_category_edit');
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
