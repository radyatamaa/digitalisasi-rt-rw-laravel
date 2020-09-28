<?php

namespace App\Http\Requests;

use App\Keuangan_Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreKeuanganCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('keuangan_category_create');
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
