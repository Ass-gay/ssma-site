<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'date_event' => 'required|date',
            'type' => 'required|in:gamou,ziar,Autres',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Le titre est obligatoire',
            'title.string' => 'Le title doit être une chaîne de caractères.',
            'title.max' => 'Le titre ne doit pas dépasser 255 caractères',
            'description.required' => 'La description est obligatoire',
            'description.string' => 'Le description doit être une chaîne de caractères.',
            'photo.image' => 'Le fichier photo doit être une image.',
            'photo.mimes' => 'Le fichier photo doit être de type: jpeg, png, jpg, gif, webp.',
            'photo.max' => 'Le fichier photo ne peut pas dépasser 2MB.',
            'date_event.required' => 'La date est obligatoire',
            'date_event.date' => 'Date invalide',
            'type.required' => 'Le type est obligatoire',
            'type.in' => 'Type invalide (gamou, ziar, Autres)',
        ];
    }
}
