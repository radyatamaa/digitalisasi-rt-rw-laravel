<?php

namespace App\Http\Requests;

use App\Event;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('event_create');
    }

    public function rules()
    {
        return [
            'event_name' => [
                'required',
            ],
            'event_rt' => [
                'required',
            ],
            'event_category' => [
                'required',
            ],
            'event_date' => [
                'required',
            ],
        ];
    }
}
