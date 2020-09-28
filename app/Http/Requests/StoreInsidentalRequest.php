<?php

namespace App\Http\Requests;

use App\Insidental;
use Illuminate\Foundation\Http\FormRequest;

class StoreInsidentalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('insidental_create');
    }

    public function rules()
    {
        return [
            'ins_name' => [
                'required',
            ],
            'ins_category' => [
                'required',
            ],
            'ins_detail' => [
                'required',
            ],

            'ins_date' => [
                'required',
            ],
        ];
    }
}
