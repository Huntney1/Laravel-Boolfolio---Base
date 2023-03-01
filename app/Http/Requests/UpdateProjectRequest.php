<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'title' => 'required|max:155', // campo obbligatorio con una lunghezza massima di 255 caratteri
            'description' => 'nullable|string', //* campo facoltativo di tipo stringa
            'category' => 'nullable|string', // campo facoltativo di tipo stringa
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //*  campo facoltativo di tipo immagine con i formati consentiti JPEG, PNG, JPG, GIF e SVG e dimensione massima di 2 MB
            'url' => 'nullable|url|max:255', // campo facoltativo che deve essere un URL valido e ha una lunghezza massima di 255 caratteri
            'published' => 'nullable|date', //* campo facoltativo che deve essere una data valida

        ];
    }

    public function messages()
    {

        return [

            'title.required' => 'Il titolo del progetto è obbligatorio',
            'title.max' => 'Il titolo del progetto non può superare i :max caratteri',
            'description.string' => 'La descrizione del progetto deve essere una stringa',
            'image.image' => 'Il file caricato non è un\'immagine',
            'image.mimes' => 'Il file caricato deve essere in formato: :values',
            'image.max' => 'Il file caricato non può superare i :max Kb',
            'url.url' => 'L\'URL del progetto non è valido',
            'url.max' => 'L\'URL del progetto non può superare i :max caratteri',
        ];
    }
}
