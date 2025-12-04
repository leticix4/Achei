<?php

namespace App\Http\Requests\API;

use Illuminate\Validation\Rule;
use App\Http\Requests\API\Request;

class CreateUserRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'cpf' => ['required', 'string', 'size:11', 'unique:users,cpf'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'array'],
            'address.street' => ['required', 'string', 'max:255'],
            'address.zip_code' => ['required', 'string', 'max:9'],
            'address.number' => ['required', 'string', 'max:20'],
            'address.complement' => ['nullable', 'string', 'max:255'],
            'address.landmark' => ['nullable', 'string', 'max:255'],
            'address.neighborhood' => ['required', 'string', 'max:255'],
            'address.city' => ['required', 'string', 'max:255'],
            'address.state' => ['required', 'string', 'max:2'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'A confirmação da senha não confere.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.size' => 'O CPF deve ter exatamente 11 caracteres.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'gender.in' => 'O gênero informado é inválido.',
            'phone.required' => 'O telefone celular é obrigatório.',

            'address.required' => 'O endereço é obrigatório.',
            'address.street.required' => 'O campo rua é obrigatório.',
            'address.zip_code.required' => 'O CEP é obrigatório.',
            'address.number.required' => 'O número é obrigatório.',
            'address.neighborhood.required' => 'O bairro é obrigatório.',
            'address.city.required' => 'A cidade é obrigatória.',
            'address.state.required' => 'O estado é obrigatório.',
        ];
    }
}
