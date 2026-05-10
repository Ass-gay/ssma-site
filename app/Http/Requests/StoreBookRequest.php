<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,mp3,wav',
            'type' => 'required|in:pdf,audio',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Le titre est obligatoire',
            'title.string' => 'Le title doit être une chaîne de caractères.',
            'file.required' => 'Le fichier est obligatoire',
            'file.mimes' => 'Formats autorisés : pdf, mp3, wav',
            'type.required' => 'Le type est obligatoire',
        ];
    }
}
