<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectsRequest extends FormRequest
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
            //'sometimes'=solo valida si el campo esta presente
            'title'=>'sometimes|required|string|max:255',
            'description'=>'sometimes|required|string',
            'image'=>'nullable|string',
            'url_demo'=>'nullable|url',
            'url_github'=>'nullable|url',
            'technologies'=>'sometimes|required|array',
            'technologies.*'=>'string',
            'featured'=>'boolean',
        ];
    }
    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return[
            'title.required'=>'El titulo es obligatorio.',
            'title.max'=>'El titulo no puede tener mas de 255 caracteres.',
            'description.required'=>'La descripcion es obligatoria.',
            'url_demo.url'=>'La URL del demo debe ser valida.',
            'url_github.url'=>'La URL de GitHub debe ser valida.',
            'technologies.required'=>'Debes especifcar al menos una technologias.',
            'technologies.array'=>'Las tecnologias deben ser un array.',
        ];
    }
    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return[
            'title'=>'titulo',
            'description'=>'descripcion',
            'url_demo'=>'URL del demo',
            'url_github'=>'URL de GitHub',
            'technologies'=>'technologias',
        ];
    }
}
