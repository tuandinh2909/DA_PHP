<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tieu_de'=>'required',
            'noi_dung'=>'required',
            
        ];
    }
    public function messages()
    {
        return[
            'tieu_de.required'=>'Tiêu đề không được để trống!',
            'noi_dung.required'=>'Nội dung không được để trống !',
        ];
    }
}
