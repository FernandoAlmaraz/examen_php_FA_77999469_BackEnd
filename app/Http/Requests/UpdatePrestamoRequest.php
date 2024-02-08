<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrestamoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'loan_date' => ['required', 'date', 'min:1', 'max:100'],
                'loan_days' => ['required', 'int'],
                'status' => ['required', 'string'],
            ];
        } else {
            return [
                'loan_date' => ['sometimes', 'date', 'min:1', 'max:100'],
                'loan_days' => ['sometimes', 'int'],
                'status' => ['sometimes', 'string'],
            ];
        }
    }
}
