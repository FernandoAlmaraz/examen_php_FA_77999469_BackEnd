<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibroRequest extends FormRequest
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
        return [
            'title' => ['required', 'string', 'min:1', 'max:100'],
            'lot' => ['required', 'int'],
            'description' => ['required', 'string', 'min:1', 'max:100'],
            'genre' => ['required', 'string'],
            'autor_id' => ['required', 'int'],
        ];
    }
}
