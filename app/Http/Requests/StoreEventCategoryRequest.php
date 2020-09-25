<?php

namespace App\Http\Requests;

use App\Event_Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('event_category_create');
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
