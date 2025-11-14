<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÿ\s]+$/',
                function ($attribute, $value, $fail) {
                    if (strtolower(request()->user()->name) === 'admin' && $value !== 'admin') {
                        $fail('O nome do usuário admin não pode ser alterado.');
                    }

                    if (strtolower($value) === 'admin' && strtolower(request()->user()->name) !== 'admin') {
                        $fail('O nome "admin" não pode ser usado.');
                    }
                }
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve conter apenas texto.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'name.regex' => 'O nome deve conter apenas letras.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.string' => 'O e-mail deve ser um texto válido.',
            'email.lowercase' => 'O e-mail deve estar em letras minúsculas.',
            'email.email' => 'Digite um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este e-mail já está sendo utilizado por outro usuário.',
        ];
    }
}
