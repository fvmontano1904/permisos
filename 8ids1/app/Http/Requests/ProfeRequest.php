<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfeRequest extends FormRequest
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
            'numero'=>'required|regex:/^[a-zA-Z0-9ñÑ\s\-]+$/|min:3|max:10',
            'nombre'=>'required|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\-]+$/|min:15|max:58',
            'horas_asignadas'=>'required|min:1|max:168|numeric',
            'dias_eco_corre'=>'required|min:1|max:31|numeric',
        ];
    }
    public function messages(): array
    {
        return[
            'numero.required'=>'Completa el campo número',
            'numero.min'=>'El número debe tener un minimo de 3 caracteres',
            'numero.max'=>'El número debe tener un maximo de 10 caracteres',
            'numero.regex'=>'No se aceptan caracteres especiales en el campo número',
            'nombre.required'=>'Completa este campo',
            'nombre.regex'=>'No se aceptan caracteres especiales en el nombre',
            'nombre.min'=>'El nombre debe tener un minimo de 15 caracteres',
            'nombre.max'=>'El nombre debe tener como maximo 58 caracteres',
            'horas_asignadas.numeric'=>'El camppo Horas asignadas solo acepta numeros',
            'horas_asignadas.max'=>'El campo horas asignadas acepta solo 168 horas',
            'dias_eco_corre.numeric'=>'El camppo Dias economicos solo acepta numeros',
            'dias_eco_corre.max'=>'El campo Dias economicos acepta solo 31 dias'
        ];
    }
}
