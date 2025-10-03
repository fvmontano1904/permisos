<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDivPues extends FormRequest
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
            'codigo'=>'required|regex:/^[a-zA-Z0-9ñÑ\s\-]+$/|min:3|max:10',
            'nombre'=>'required|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\-]+$/|min:3|max:45'
        ];
    }
    public function messages(): array
    {
        return[
            'codigo.regex'=>'No se aceptan caracteres especiales en el código',
            'codigo.required'=>'Completa este campo',
            'codigo.min'=>'El código debe tener un minimo de 3 caracteres',
            'codigo.max'=>'El código debe tener un maximo de 10 caracteres',
            'nombre.regex'=>'No se aceptan caracteres especiales en el nombre',
            'nombre.min'=>'El nombre debe tener un minimo de 3 caracteres',
            'nombre.max'=>'El nombre debe tener como maximo 45 caracteres'
        ];
    }
}
