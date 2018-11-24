<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditTypeRequest extends FormRequest
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
                'required','string','max:255',Rule::unique('types','name')->ignore($id)],
        ];
    }
    public function messages(){
        return [
            'name.required'=>'لطفا نام را وارد نمایید',
            'name.string'=>'لطفا کاراکتر وارد کنید',
            'name.unique'=>'نام  قبلا ثبت شده است',

        ];
    }
}
