<?php
namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя.',
            'email.required' => 'Введите email.',
            'email.unique' => 'Этот email уже зарегистрирован.',
            'password.required' => 'Введите пароль.',
            'password.confirmed' => 'Пароли не совпадают.',
        ];
    }
}
