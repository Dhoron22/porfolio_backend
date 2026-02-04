<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalInfoRequest extends FormRequest
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
            'nombre_completo' => 'sometimes|required|string|max:255',
            'titulo' => 'sometimes|required|string|max:255',
            'bio' => 'sometimes|required|string|max:1000',
            'location' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|max:255',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'age' => 'nullable|integer|min:18|max:100',
            'profile_image' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nombre_completo.required' => 'El nombre completo es requerido.',
            'nombre_completo.max' => 'El nombre completo no puede tener mas de 255 caracteres.',
            'titulo.required' => 'El título profesional es obligatorio',
            'titulo.max' => 'El título no puede tener mas de 255 caracteres.',
            'bio.required' => 'La biografía es obligatoria',
            'bio.max' => 'La biografía no puede tener mas de 1000 caracteres.',
            'location.required' => 'La ubicación es obligatoria.',
            'phone.required' => 'El teléfono es obligatorio',
            'phone.max' => 'El teléfono no puede tener mas de 20 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El email debe ser una direccion valida',
            'github_url.url' => 'La URL de GitHub debe ser una URL válida.',
            'linkedin_url.url' => 'La URL de LinkedIn debe ser una URL válida.',
            'age.integer' => 'La edad debe ser un número entero.',
            'age.min' => 'La edad debe ser al menos 18 años. ',
            'age.max' => 'La edad no puede ser mayor a 100 años.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre_completo' => 'nombre completo',
            'titulo' => 'titulo profesional',
            'bio' => 'biografia',
            'location' => 'ubicacion',
            'phone' => 'numero de telefono',
            'email' => 'correo electronico',
            'github_url' => 'URL de Github',
            'linkedin_url' => 'URL de LinkedIn',
            'age' => 'edad',
            'profile_image' => 'imagen de perfil',
        ];
    }
}
