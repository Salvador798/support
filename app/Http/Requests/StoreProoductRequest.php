<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProoductRequest extends FormRequest
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
            'ci' => 'required|max:50',
            'name_client' => 'required|max:50',
            'lastname_client' => 'required|max:50',
            'email_client' => 'required|max:50',
            'brand' => 'required|max:50',
            'name' => 'required|max:50',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'ci.required' => 'La Cédula es obligatorio',
            'name_client.required' => 'El Nombre del Cliente es obligatorio',
            'lastname_client.required' => 'El Apellido del Cliente es obligatorio',
            'email_client.required' => 'El Correo Eléctronico es Obligatorio',
            'brand.required' => 'La Marca es obligatorio',
            'name.required' => 'El nombre es obligatorio',
        ];
    }
}
