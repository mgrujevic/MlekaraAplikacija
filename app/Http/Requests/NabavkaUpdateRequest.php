<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NabavkaUpdateRequest extends FormRequest
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
            'dobavljac_id' => ['required', 'integer', 'exists:dobavljacs,id'],
            'sirovina_id' => ['required', 'integer', 'exists:sirovinas,id'],
            'datum' => ['required'],
            'kolicina' => ['required', 'integer'],
            'cena' => ['required', 'numeric', 'between:-99999999.99,99999999.99'],
        ];
    }
}
