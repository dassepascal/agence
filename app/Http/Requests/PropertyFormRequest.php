<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'title' => 'required|string|min:8',
            'description' => 'required|string',
            'surface' => 'required|integer',
            'rooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'floor' => 'required|integer',
            'price' => 'required|integer',
            'city' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'sold' => 'boolean',
            'options' => ['array','exists:options,id','required'],
        ];
    }
}
