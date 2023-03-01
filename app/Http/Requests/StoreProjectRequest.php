<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|max:255', // campo obbligatorio con una lunghezza massima di 255 caratteri
            'description' => 'nullable|string', //* campo facoltativo di tipo stringa
            'category' => 'nullable|string', // campo facoltativo di tipo stringa
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //*  campo facoltativo di tipo immagine con i formati consentiti JPEG, PNG, JPG, GIF e SVG e dimensione massima di 2 MB
            'url' => 'nullable|url|max:255', // campo facoltativo che deve essere un URL valido e ha una lunghezza massima di 255 caratteri
            'published' => 'nullable|date', //* campo facoltativo che deve essere una data valida
        ];
    }
}
