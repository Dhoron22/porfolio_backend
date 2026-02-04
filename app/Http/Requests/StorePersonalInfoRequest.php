<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalInfoRequest extends FormRequest
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
            'nombre_completo' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'bio' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
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
            'nombre_completo.required' => 'El nombre completo es obligatorio',
            'nombre_completo.max' => 'El nombre completo no puede tener mas de 255 caracteres',
            'titulo.required' => 'El titulo profesional es oblgatorio',
            'titulo.max' => 'El titulo no puede tener mas de 255 caracteres',
            'bio.required' => 'la biografia es obligatoria',
            'bio.max' => 'la biografia no puede tener mas de 1000 caracteres',
            'location.required' => 'La ubicacion es obligatoria',
            'phone.required' => 'El numero de telefono es obligatorio',
            'phone.max' => 'El numero de telefono no puede tener mas de 20 caracteres',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser una direccion valida',
            'github_url.url' => 'La URL de GitHub debe ser valida',
            'linkedin_url.url' => 'La URL de LinkedIn debe ser valida',
            'age.integer' => 'La edad debe ser un numero entero',
            'age.min' => 'La edad debe ser mayor o igual a 18',
            'age.max' => 'La edad debe ser menor o igual a 100',
        ];
    }
        /**
         * Get custom atributes for validator errors
         */
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
