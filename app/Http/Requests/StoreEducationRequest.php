<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'current' => 'boolean',
            'status' => 'required|in:completed,in_progress,paused',
            'certificate_url' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'institution.required' => 'La institución es obligatoria.',
            'institution.max' => 'La institución no puede tener más de 255 caracteres.',

            'degree.required' => 'El titulo de grado es obligatorio.',
            'degree.max' => 'El titulo de grado no puede tener más de 255 caracteres.',

            'start_date.date' => 'La fecha de inicio debe ser una fecha valida',

            'end_date.date' => 'La fecha de fin debe ser una fecha valida',
            'end_date.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio',

            'status.required' => 'El estado es obligatorio.',
            'status.in' => 'El estado debe ser: completado,en curso o pausado',

            'certificate_url.url' => 'La URL del certificado debe ser valida',

            'order.integer' => 'El orden debe ser un numero entero',
            'order.min' => 'El orden debe ser mayor o igual a 0',
        ];
    }

    public function attributes(): array
    {
        return [
            'institution' => 'Institucion',
            'degree' => 'titulo o grado',
            'field_of_study' => 'campo de estudio',
            'description' => 'descripcion',
            'start_date' => 'fecha de inicio',
            'end_date' => 'fecha de fin',
            'current' => 'en curso',
            'status' => 'estado',
            'certificate_url' => 'URL del certificado',
            'location' => 'ubicacion',
            'order' => 'orden',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->current === true || $this->current === 'true'){
            $this->merge([
                'end_date' => null,
                'current' => true,
                'status' => 'in_progress',
            ]);
        }
    }
}
