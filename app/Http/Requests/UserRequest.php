<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
			'N_Documento' => 'required|string',
			'Nombre' => 'required|string',
			'Apellido' => 'required|string',
			'Fecha_Nacimiento' => 'required',
			'Tipo_Documento' => 'required|string',
			'Telefono' => 'required|string',
			'email' => 'required|string',
            'password' => 'required|string',

        ];
    }
}
