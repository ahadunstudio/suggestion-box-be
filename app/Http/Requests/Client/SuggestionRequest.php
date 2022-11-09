<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
class SuggestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'phone_number' => 'Nomor hp',
            'suggestion' => 'Wishers / Harapan RKAP 2023',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'nip' => ['required'],
            'rank' => ['required'],
            'unit' => ['required'],
            'participant' => ['required'],
        ];
    }
}
