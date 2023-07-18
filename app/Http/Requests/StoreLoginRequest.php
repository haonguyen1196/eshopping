<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
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
            'email_login' => 'required|email:rfc,dns',
            'password_login' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email_login.required' => 'Email không được để trống!',
            'password_login.required' => 'Password không được để trống!',
        ];
    }
}
