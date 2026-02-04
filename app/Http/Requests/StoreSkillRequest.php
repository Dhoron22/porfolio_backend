<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
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
            'category' => 'required|in:technical,soft,tool',
            'subcategory' => 'nullable|string|max:255',
            'proficiency' => 'nullable|integer|min:0|max:100',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la habilidad es obligatorio',
            'name.max' => 'El nombre no puede tener mas de 255 caracteres',

            'category.required' => 'La categoria es obligatoria',
            'category.in' => 'La categoria debe ser: technical, soft o tool',


            'proficiency.integer' => 'El nivel de competencia debe ser un numero entero',
            'proficiency.min' => 'El nivel de competencia debe ser al menos 0',
            'proficiency.max' => 'El nivel de competencia no puede ser mayor a 100',

            'featured.boolean' => 'El campo destacado debe ser verdadero o falso',

            'order.integer' => 'El orden debe ser entero',
            'order.min' => 'El orden debe ser mayor o igual a 0',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'category' => 'categoria',
            'subcategory' => 'subcategoria',
            'proficiency' => 'nivel de competencia',
            'icon' => 'icono',
            'description' => 'descripcion',
            'featured' => 'destacado',
            'order' => 'orden',
        ];
    }

    protected function prepareForValidation()
    {
        if($this->category === 'soft'){
        $this->merge([
            'proficiency' => null,
        ]);
        }
    }
}
