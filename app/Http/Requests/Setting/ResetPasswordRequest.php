<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ResetPasswordRequest extends FormRequest
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
            'old_password' => 'Password sekarang',
            'new_password' => 'Password baru',
            'new_password_confirmation' => 'Konfirmasi password baru',
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
            'old_password' => ['required'],
            'new_password' => ['required', 'min:6'],
            'new_password_confirmation' => ['required', 'same:new_password'],
        ];
    }

    /**
     * Get the password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return Hash::make($this->new_password);
    }
}
