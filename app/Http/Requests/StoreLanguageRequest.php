<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
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
            'proficiency' => 'required|in:Nativo,Avanzado,Intermedio,Basico',
            'level_code' => 'nullable|in:A1,A2,B1,B2,C1,C2',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ];
    }

    public function mensagges(): array
    {
        return [
            'name.required' => 'El nombre del idioma es obligatorio',
            'name.max' => 'El nombre no puede tener mas de 255 caracteres',

            'proficiency.required' => 'El nivel de competencia es obligatorio',
            'proficiency.in' => 'El nivel debe ser: Nativo,Avanzado,Intermedio,Basico',

            'level_code.in' => 'El codigo de nivel debe ser: A1,A2,B1,B2,C1,C2',

            'order.integer' => 'El orden debe ser un numero entero',
            'order.min' => 'El orden debe ser mayor o igual a 0',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => ' nombre del idioma',
            'proficiency' => 'nivel de competencia',
            'level_code' => 'codigo de nivel',
            'description' => 'descripcion',
            'order' => 'orden',
        ];
    }
}
