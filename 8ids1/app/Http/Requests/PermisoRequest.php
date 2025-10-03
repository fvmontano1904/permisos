<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermisoRequest extends FormRequest
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
            'fecha' => 'required|date|after_or_equal:today',
            'motivo'=>'regex:/^[a-zA-Z0-9ñÑ\s\-]+$/|min:5|max:50'
        ];
    }
    public function messages()
    {
        return[
        'fecha.required'=>'El campo fecha es obligatorio',
        'fecha.after_or_equal'=>'No se puede seleccionar una fecha pasada',
        'motivo.min'=>'El motivo debe tener un minimo de 5 caracteres',
        'motivo.max'=>'El  debe tener un maximo de 50 caracteres',
        'motivo.regex'=>'No se aceptan caracteres especiales en el campo motivo',
        ];
    }
}
