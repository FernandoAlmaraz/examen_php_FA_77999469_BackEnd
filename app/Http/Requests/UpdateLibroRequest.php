<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLibroRequest extends FormRequest
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
                'title' => ['required', 'string', 'min:1', 'max:100'],
                'lot' => ['required', 'int'],
                'description' => ['required', 'string', 'min:1', 'max:100'],
                'genre' => ['required', 'string'],
            ];
        } else {
            return [
                'title' => ['sometimes', 'string', 'min:1', 'max:100'],
                'lot' => ['sometimes', 'int'],
                'description' => ['sometimes', 'string', 'min:1', 'max:100'],
                'genre' => ['sometimes', 'string'],
            ];
        }
    }
}
