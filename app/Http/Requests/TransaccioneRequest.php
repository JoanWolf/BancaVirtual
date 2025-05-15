<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaccioneRequest extends FormRequest
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
			'llave_fk' => 'required',
			'Fecha_Envio' => 'required',
			'Monto' => 'required',
			'Referencia' => 'required|string',
			'Tipo' => 'required|string',
			'Estado' => 'required|string',
			'Emisor_fk' => 'required',
			'Receptor_fk' => 'required',
        ];
    }
}
