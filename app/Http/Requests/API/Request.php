<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function expectsJson()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422));
    }
}
