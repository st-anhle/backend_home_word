<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'Name is required'
    //     ];
    // }

    protected function failedValidation(Validator $validator) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(response()->json(
                [
                    'error' => $errors,
                    'status_code' => 422,
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        
    }
    
}
