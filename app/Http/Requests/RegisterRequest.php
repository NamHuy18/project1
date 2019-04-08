<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|min:3|max:100',
            'email'=>'required',
            'password'=>'required',
            'passwordAgain'=>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('setting.name_required'),
            'name.min' => trans('setting.name_length'),
            'name.max' => trans('setting.name_length'),
            'email.required' => trans('setting.loginpage.email'),
            'password.required' => trans('setting.loginpage.password'),
            'passwordAgain.required' => trans('setting.registerpage.passwordagain1'),
        	'passwordAgain.same' => trans('setting.registerpage.passwordagain2'),
        ];
    }
}
