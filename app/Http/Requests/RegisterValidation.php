<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
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
            'firstname' => 'required|min:3',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric',
            'country_code' => 'required',
            //'register-agree' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            //'register-agree' => 'Aggree'
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => 'Please Enter First Name',
            'lastname.required' => 'Please Enter Last Name',
            'email.required' => 'Please Enter Valid Email Id',
            'password.required' => 'Please Enter Password',
            'phone.required' => 'Please Enter Phone No',
            'phone.size' => 'Maximum Phone No 10 Digit',
            //'register-agree.required' => 'Please Select Privacy Policy'
        ];
    }
}
