<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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

        $id = $this->input('id');
        return [
            'name'=>[
                'required','string','max:255',Rule::unique('users','name')->ignore($id)],
            'email'=>[
                'required','email','string','max:255',Rule::unique('users','email')->ignore($id)],
            'name_header'=>['required','string','max:255'],
            'phone'=>'nullable|regex:/(09)[0-9]{9}/'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'لطفا نام کاربری را وارد نمایید',
             'name.string'=>'لطفا کاراکتر وارد کنید',
            'name.unique'=>'نام کاربری قبلا ثبت شده است',
            'name_header.required'=>'لطفا نام خود را وارد نمایید',
            'email.required'=>'لطفا ایمیل را وارد نمایید',
            'email.email'=>'لطفا ایمیل صحیح وارد نمایید',
            'email.unique'=>'ایمیل قبلا ثبت شده است',
            'email.string'=>'لطفا کاراکتر وارد کنید',
            'phone.regex'=>'موبایل صحیح نمی باشد'

        ];
    }
}
