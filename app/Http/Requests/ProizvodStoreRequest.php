<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProizvodStoreRequest extends FormRequest
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
            'jedinica_mere' => ['required', 'in:kg,l,kom'],
            'ukupna_kolicina' => ['required', 'integer'],
            'cena' => ['required', 'numeric', 'between:-99999999.99,99999999.99'],
        ];
    }
}
