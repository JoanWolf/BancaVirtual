<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PqrRequest extends FormRequest
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
			'Asunto' => 'required|string',
			'Fecha_Envio' => 'required',
			'Estado' => 'required|string',
			'Descripcion' => 'required|string',
			'Respuesta' => 'string',
			'Emisor_fk' => 'required',
			'Receptor_fk' => 'required',
        ];
    }
}
