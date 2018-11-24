<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'name'=>'required|unique:types',
        ];
    }
    public function messages()
    {
        return [

            'name.unique'=>'این نام قبلا ثبت شده است',
            'name.required'=>'لطفا نوع را وارد کنید',

        ];
    }
}
