<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
                'name' => ['required', 'string', 'min:1', 'max:100'],
                'email' => ['required', 'string'],
                'cellphone' => ['required', 'string'],
                'id_card' => ['required', 'string'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'string', 'min:1', 'max:100'],
                'email' => ['sometimes', 'string'],
                'cellphone' => ['sometimes', 'string'],
                'id_card' => ['sometimes', 'string'],
            ];
        }
    }
}
