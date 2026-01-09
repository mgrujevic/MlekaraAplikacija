<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'ime' => ['required', 'string', 'max:50'],
            'prezime' => ['required', 'string', 'max:50'],
            'korisnicko_ime' => ['required', 'string', 'max:20', 'unique:users,korisnicko_ime'],
            'uloga' => ['required', 'in:administrator,operater,menadzer_prodaje'],
            'lozinka' => ['required', 'string', 'max:255'],
        ];
    }
}
