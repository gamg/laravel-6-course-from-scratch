<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStore extends FormRequest
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
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email:filter|unique:users',
            'phone' => 'required|max:40',
            'password' => ['required','min:8','confirmed']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'El campo :attribute debe ser obligatorio',
            'email' => 'El correo electrónico no es válido',
            'max' => 'El campo :attribute no debe tener mas de :max caracteres'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'last_name' => 'Apellido',
            'email' => 'Correo electrónico',
            'phone' => 'Teléfono',
            'password' => 'Contraseña'
        ];
    }
}
