<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'username' =>'required',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập Email hoặc Username ',
            'password.required' => 'Vui lòng nhập mật khẩu của bạn',
        ];
    }
}
