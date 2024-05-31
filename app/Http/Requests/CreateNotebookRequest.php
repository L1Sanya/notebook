<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateNotebookRequest extends FormRequest
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
            'last_name'    => 'required|string|max:255',
            'first_name'   => 'required|string|max:255',
            'middle_name'  => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'phone'        => 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'birth_date'   => 'nullable|date',
            'image_id'     => 'nullable|int|exists:images,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $response = response(status: 400);
        try {
            $response->setContent([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ]);
        } catch (\Throwable) {
        }
        throw new HttpResponseException($response);
    }

}
