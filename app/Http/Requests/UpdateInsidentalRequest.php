<?php

namespace App\Http\Requests;

use App\Insidental;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInsidentalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('insidental_edit');
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
