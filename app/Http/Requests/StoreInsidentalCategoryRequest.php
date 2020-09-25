<?php

namespace App\Http\Requests;

use App\Insidental_Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreInsidentalCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('insidental_category_create');
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
