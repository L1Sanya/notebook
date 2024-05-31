<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateNotebookRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'last_name'    => 'string|nullable',
            'first_name'   => 'string|nullable',
            'middle_name'  => 'string|nullable',
            'company_name' => 'string|nullable',
            'phone'        => 'string|nullable|unique:notebooks',
            'email'        => 'email|nullable|unique:notebooks',
            'birth_date'   => 'date|nullable',
            'image_id'     => 'int|nullable|exists:images,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
