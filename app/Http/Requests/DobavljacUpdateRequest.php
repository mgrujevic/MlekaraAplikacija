<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DobavljacUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'naziv' => ['required', 'string', 'max:50'],
            'kontakt_osoba' => ['nullable', 'string', 'max:50'],
            'adresa' => ['nullable', 'string', 'max:50'],
            'telefon' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:50', 'unique:dobavljacs,email'],
        ];
    }
}
