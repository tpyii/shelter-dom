<?php

namespace App\Http\Requests\User;

use App\Rules\ReCaptchaRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255', 'alpha'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', Password::default()],
            'is_admin' => ['required', 'in:0,1'],
            'recaptcha_token' => ['required', new ReCaptchaRule()]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Кличка',
            'password' => 'Пароль',
            'is_admin' => 'Является админом'
        ];
    }

    public function messages()
    {
        return [
            'regex' => 'Значение поля :attribute должно содержать не менее 10 символов, среди который должны быть заглавные и прописные буквы, цифры и спецсимволы.'
        ];
    }

    public function validated()
    {
        return array_merge(
            parent::validated(),
            [
                'password' => Hash::make($this->password),
            ]
        );
    }
}
