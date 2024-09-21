<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        $rules =  [
           "name" => 'required|string',
        ];
        if ($this->method() === "PUT") {
            $rules = [
                'status' => 'boolean',
                'name' => 'required|string',
            ];
            return $rules;
        }
        return $rules;
    }
}
