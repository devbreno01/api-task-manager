<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    public function rules(): array
    {
        $rules = [
            "name" => "required|string",
            "email" => "required|string|email|unique:users,email",
            "password" => "required"

        ];
        if($this->method() === 'PUT'){
            $rules = [
               "name" => "required|string",
            ];
            return $rules;
        }
        return $rules;
    }
}
