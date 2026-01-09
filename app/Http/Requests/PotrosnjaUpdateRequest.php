<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PotrosnjaUpdateRequest extends FormRequest
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
            'serija_proizvoda_id' => ['required', 'integer', 'exists:serija_proizvoda,id'],
            'sirovina_id' => ['required', 'integer', 'exists:sirovine,id'],
            'kolicina' => ['required', 'integer'],
        ];
    }
}
