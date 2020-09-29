<?php

namespace App\Http\Requests;

use App\Keuangan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKeuanganRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('keuangan_edit');
    }

    public function rules()
    {
        return [
            'keuangan_tipe' => [
                'required',
            ],
            'keuangan_category' => [
                'required',
            ],
            'keuangan_periode' => [
                'required',
            ],
            'keuangan_value' => [
                'required',
            ],
            'keuangan_warga_id' => [
                'required',
            ],
            'keuangan_rt' => [
                'required',
            ],
        ];
    }
}
