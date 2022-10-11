<?php

namespace App\Http\Requests;

use App\Enums\SuggestionStatus;
use App\Models\SuggestionSetting;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'selected' => ['required', new Enum(SuggestionStatus::class)],
        ];
    }

    public function hasSetting(): bool
    {
        return !is_null($this->setting());
    }

    public function setting(): SuggestionSetting | null
    {
        return SuggestionSetting::first();
    }

    /**
     * Get screen
     *
     * @return array
     */
    public function getScreen(): array
    {
        return ['screen' => $this->selected];
    }
}
