<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkExperienceRequest extends FormRequest
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
            'company' => 'sometimes|required|string|max:255',
            'position' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'current' => 'boolean',
            'responsabilities' => 'nullable|array',
            'responsabilities.*' => 'string',
            'reference_name' => 'nullable|string|max:255',
            'reference_phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'company.required' => 'El nombre de la empresa es oblifatorio',
            'company.max' => 'El nombre de la empresa no puede tener mas de 255 caracteres',

            'position.required' => 'El cargo es obligatorio',
            'position.max' => 'El cargo no puede tener mas de 255 caracteres',

            'description.required' => 'La descripción es obligatoria',

            'start_date.required' => 'La fecha de inicio es obligatoria',
            'start_date.date' => 'La fecha de inicio debe ser una fecha válida',

            'end_date.date' => 'La fecha de finalización debe ser una fecha válida',
            'end_date.after_or_equal' => 'La fecha de finalización debe ser posterior o igual a la fecha de inicio',
            'current.boolean' => 'El campo debe ser verdadero o falso',

            'responsabilities.array' => 'Las responsablidades deben ser un array',
            'responsabilities.*.string' => 'Cada responsabilidad debe ser una cadena de texto',

            'reference_phone.max' => 'El número de teléfono no puede tener mas de 20 caracteres',

            'order.integer' => 'El orden debe ser un número entero',
            'order.min' => 'El orden debe ser mayor a 0',
        ];
    }

    public function attributes(): array
    {
        return [
            'company' => 'empresa',
            'position' => 'cargo',
            'description' => 'descripcion',
            'location' => 'ubicacion',
            'start_date' => 'fecha de inicio',
            'end_date' => 'fecha de fin',
            'current' => 'trabajo actual',
            'responsabilities' => 'responsabilidades',
            'reference_name' => 'nombre de referencia',
            'reference_phone' => 'teléfono de referencia',
            'order' => 'orden',
        ];
    }

    protected function prepareForValidation()
    {
        if($this->current === true || $this->current === 'true') {
            $this->merge([
                'end_date' => null,
                'current' => true,
            ]);
        }
    }
}
