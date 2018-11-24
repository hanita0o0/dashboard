<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\User;

class EditClubRequest extends FormRequest
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
        $id= $this->input('id');//id event
        return [
            'name'=>'required',Rule::unique('events','name')->ignore($id),
            'manager'=>'required'
        ];
    }
    public function messages(){
        return [
        'name.required'=>'لطفا نام باشگاه را وارد نمایید',
          'manager.required'=>'لطفاحداقل نام یک مدیر را وارد نمایید',
            'name.unique'=>'نام باشگاه قبلا ثبت شده است',
            ];
    }
}
