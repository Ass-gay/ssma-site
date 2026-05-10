<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'sexe' => 'required|in:Homme,Femme',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'profession' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'nom.string' => 'Le nom doit être une chaîne de caractere.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'sexe.required' => 'Le sexe est obligatoire',
            'sexe.in' => 'Le sexe doit être Homme ou Femme',
            'date_naissance.required' => 'La date de naissance est obligatoire',
            'lieu_naissance.required' => 'Le lieu de naissance est obligatoire',
            'lieu_naissance.string' => 'lieu naissance doit être une chaîne de caractere.',
            'lieu_naissance.max' => 'lieu naissance ne peut pas dépasser 255 caractères.',
            'adresse.required' => 'L\'adresse est obligatoire',
            'adresse.string' => 'Adresse doit être une chaîne de caractere.',
            'adresse.max' => 'Adresse ne peut pas dépasser 255 caractères.',
            'telephone.required' => 'Le téléphone est obligatoire',
            'telephone.string' => 'Le numerp doit être une chaîne de caractere.',
            'telephone.max' => 'Le numero ne peut pas dépasser 20 caractères.',

            'profession.string' => 'Le numerp doit être une chaîne de caractere.',

            'photo.image' => 'Le fichier doit être une image',
            'photo.mimes' => 'Formats autorisés: jpeg, png, jpg, gif, webp',
            'photo.max' => 'La photo ne doit pas dépasser 2MB',
        ];
    }
}
