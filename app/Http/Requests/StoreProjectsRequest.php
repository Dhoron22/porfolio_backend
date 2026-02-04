<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /** Aqui va la logica de autorizacion */
    public function authorize(): bool
    {
        return true; // cambia a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description'=>'required|string',
            'image'=> 'nullable|string',
            'url_demo'=>'nullable|url',
            'url_github'=>'nullable|url',
            'technologies'=>'required|array',
            'technologies.*'=>'string', //cada elemento del array debe ser un string
            'featured'=>'boolean',
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * Mensajes personalizados en español
     */
    public function messages():array
    {
        return [
            'title.required'=> 'El título es obligatorio.',
            'title.max'=> 'El titulo no puede tener más de 255 caracteres.',
            'description.required'=>'La descripción es obligatoria.',
            'url_demo.url'=>'La URL de la demo debe ser válida.',
            'url_github.url'=>'La URL de GitHub debe ser válida.',
            'technologies.required'=>'Debes especificar al menos una tecnología.',
            'technologies.array'=>'Las tecnologías deben ser un aarray.',
        ];
    }
    /**
     * Get custom attributes for validator errors
     *
     * Nombres personalizados de campos
    */
    public function attributes():array
    {
        return [
            'title'=>'titulo',
            'description'=> 'descripcion',
            'url_demo'=> 'URL del demo',
            'url_github'=> 'URL de GitHub',
            'technologies'=>'tecnologías',
        ];
    }
}
