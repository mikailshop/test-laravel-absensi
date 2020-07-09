<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CutiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_cuti' => 'required',
            'mulai_cuti' => 'required',
            'selesai_cuti' => 'required',
            'selama' => 'required',
            'alasan' => 'required',
        ];
    }
}
