<?php

namespace App\Http\Requests;

use App\Models\Suggestion;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;

class SuggestionStatusRequest extends FormRequest
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
            'status' => ['required'],
            'selected' => ['required', 'array', Rule::in($this->getSuggestions()->get()->pluck('id')->all())],
        ];
    }

    public function getSuggestions(): Builder
    {
        return Suggestion::whereIn('id', $this->selected);
    }

    public function getSelected(): Collection
    {
        return collect($this->selected);
    }
}
