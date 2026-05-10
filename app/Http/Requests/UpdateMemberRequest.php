<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nom' => 'required|string',
            'sexe' => 'required|string',
            'dateNaiss' => 'required|date',
            'lieuNaiss' => 'required|string',
            'adresse' => 'required|string',
            'tel' => 'required|string',
            'status' => 'required|in:en_attente,accepte,refuse',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Le statut est obligatoire',
            'status.in' => 'Statut invalide',
        ];
    }
}
