<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'korisnicko_ime' => [
                'required', 'string', 'max:20',
                Rule::unique('users', 'korisnicko_ime')->ignore($this->route('user')->id),
            ],
            'uloga' => ['required', Rule::in(['administrator', 'operater', 'menadzer_prodaje'])],
            'lozinka' => ['nullable', 'string', 'min:4', 'max:255'],
        ];
    }
}
