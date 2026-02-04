<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
            'institution' => 'sometimes|required|string|max:255',
            'degree' => 'sometimes|required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'current' => 'boolean',
            'status' => 'sometimes|required|in:completed,in_progress,paused',
            'certificate_url' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'institution.required' => 'El nombre de la institucion es obligatorio',
            'institution.max' => 'El nombre de la institucion no puede tener mas de 255 caracteres',

            'degree.required' => ' El titulo grado es obligatorio',
            'degree.max' => 'El titulo puede tener mas de 255 caracteres',

            'start_date.date' => 'La fecha de inicio debe ser una fecha valida',

            'end_date.date' => 'La fecha de fin debe ser una fecha valida',
            'end_date.after_or_equal' => 'La fecha de finalización debe ser posterior o igual a la fecha de inicio',

            'status.required' => 'El estado es obligatorio',
            'status.in' => 'El estado debe ser: completado, en progreso o pausado',

            'certificate_url.url' => 'La URL del certficado debe ser valido',

            'order.integer' => 'El orden debe ser un entero',
            'order.min' => 'El orden debe ser mayor o igual a 0',
        ];
    }

    public function attributes(): array
    {
        return [
            'institution' => 'institucion',
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
        if ($this->current === true||$this->current === 'true'){
            $this->merge([
                'end_date' =>null,
                'current' => true,
                'status' => 'in_progress',
            ]);
        }
    }
}
