<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
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
            'type' => 'required|in:photo,video',
            'file' => 'required|file',
            'event_id' => 'required|exists:events,id',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Le type est obligatoire',
            'type.in' => 'Type invalide (photo ou video)',
            'file.required' => 'Le fichier est obligatoire',
            'event_id.required' => 'L’événement est obligatoire',
        ];
    }
}
