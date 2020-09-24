<?php

namespace App\Http\Requests;

use App\Sdm_Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreSdmCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('sdm_category_create');
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
