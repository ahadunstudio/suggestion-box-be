<?php

namespace App\Http\Requests\Setting;

use App\Models\Setting\File;
use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'url' => [!$this->getFile() ? 'required' : 'nullable'],
            'file' => [!$this->getFile() ? 'required' : 'nullable', 'file', 'mimes:pdf'],
        ];
    }

    /**
     * Determine if the request is save | store
     *
     * @return File|null
     */
    public function getFile(): File | null
    {
        return File::first();
    }

    public function getData(): array
    {
        return [
            'url' => $this->url,
            'filename' => $this->hasFile('file') ? $this->file('file')->store('attachments') : $this->getFile()?->filename,
        ];
    }
}
