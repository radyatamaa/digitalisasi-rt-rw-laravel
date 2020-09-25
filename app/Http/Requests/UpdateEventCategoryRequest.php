<?php

namespace App\Http\Requests;

use App\Event_Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('event_category_edit');
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
