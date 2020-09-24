<?php

namespace App\Http\Requests;

use App\Sdm_Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSdmCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('sdm_category_edit');
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
