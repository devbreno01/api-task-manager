<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required | string',
            'category_id' => 'required | integer',
            'user_id' => 'required | integer',
        ];
        if($this->method() == 'PUT') {
            $rules = [
                'name' => 'string',
                'description' => 'string',
                'category_id' => 'integer',
                'user_id' => 'integer',
            ];
            return $rules;
        }
        return $rules;
    }
}
