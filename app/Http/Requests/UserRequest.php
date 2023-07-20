<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'token' => hash('sha256', time()),
        ]);
    }
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        // get function method.
        $currentAction = $this->route()->getActionMethod();

        switch ($this->method()) :
            case 'POST':
                switch ($currentAction) :
                    case 'loginSubmit':
                        $rules = [
                            'email' => 'required',
                            'password' => 'required',
                        ];
                        break;

                    case 'registerSubmit':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|unique:users|email',
                            'phonenumber' => 'required',
                            'username' => 'required|unique:users',
                            'password' => 'required',
                            'token' => 'required',
                        ];
                        break;
                    endswitch;
            endswitch;

        return $rules;
    }

    public function messages(): array
    {
        return [
            'email.required' => "Bắt buộc phải nhập email",
            'email.unique' => "Email bạn nhập đã được sử dụng",
            'email.email' => "Nhập sai định dạng email",

            'password.required' => "Bắt buộc phải nhập password",

            'username.required' => "Bắt buộc phải nhập username",
            'username.unique' => "Username bạn nhập đã được sử dụng",

            'name.required' => "Bắt buộc phải nhập họ tên",

            'phonenumber.required' => "Bắt buộc phải nhập số điện thoại",
        ];
    }
}
