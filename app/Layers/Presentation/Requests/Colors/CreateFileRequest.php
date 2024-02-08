<?php

namespace App\Layers\Presentation\Requests\Colors;

use Illuminate\Foundation\Http\FormRequest;
use App\Layers\Presentation\View\Colors\FilesView;

class CreateFileRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            FilesView::FILE_NAME => 'required|image',
        ];
    }
}
