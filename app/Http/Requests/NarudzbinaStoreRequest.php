<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NarudzbinaStoreRequest extends FormRequest
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
            'proizvod_id' => ['required', 'integer', 'exists:proizvodi,id'],
            'kupac_id' => ['required', 'integer', 'exists:kupci,id'],
            'kolicina' => ['required', 'integer'],
            'datum' => ['required', 'date'],
            'status' => ['required', 'in:kreirana,u_obradi,isporucena,otkazana'],
        ];
    }
}
