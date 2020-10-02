<?php

namespace App\Http\Requests;

use App\History_Warga;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHistoryWargaRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('history_warga_edit');
    }

    public function rules()
    {
        return [
            'history_desc' => [
                'required',
            ],
            'history_date' => [
                'required',
            ],
            'history_category' => [
                'required',
            ],
            'warga_id' => [
                'required',
            ],
        ];
    }
}
