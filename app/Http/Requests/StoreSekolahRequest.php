<?php

namespace App\Http\Requests;

use App\Sekolah;
use Illuminate\Foundation\Http\FormRequest;

class StoreSekolahRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('sekolah_create');
    }

    public function rules()
    {
        return [
            'sekolah_pendidikan' => [
                'required',
            ],
            'sekolah_name' => [
                'required',
            ],
            'sekolah_wilayah' => [
                'required',
            ],
        ];
    }
}
