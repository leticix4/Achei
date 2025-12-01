<?php

namespace App\Http\Requests\API;

class CreateStoreRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'trade_name' => ['required', 'string', 'max:255'],

            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'email' => ['required', 'email', 'unique:users,email'],

            'state_registration' => ['required', 'string', 'max:50'],
            'cnpj' => ['required', 'string', 'size:18', 'unique:stores,cnpj'],
            'phone' => ['required', 'string', 'max:20'],
            'additional_phone' => ['nullable', 'string', 'max:20'],
            'category' => ['required', 'string', 'max:100'],
            'image_url' => ['nullable', 'string', 'max:255'],

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
            'name.required' => 'O nome interno da loja é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'A confirmação da senha não confere.',
            'trade_name.required' => 'O nome fantasia da loja é obrigatório.',
            'cnpj.required' => 'O CNPJ é obrigatório.',
            'category.required' => 'A categoria é obrigatória.',
            'state_registration.required' => 'A inscrição estadual é obrigatória.',
            'cnpj.size' => 'O CNPJ deve ter exatamente 18 caracteres.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado.',
            'phone.required' => 'O telefone principal é obrigatório.',

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
