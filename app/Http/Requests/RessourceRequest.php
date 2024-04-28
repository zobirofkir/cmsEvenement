<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RessourceRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'button_one' => 'nullable',
            'button_two' => 'nullable',
            'button_three' => 'nullable',
            'button_four' => 'nullable',
            'background_image' => 'required',
            'background_phone' => 'required',
        ];
    }
}


