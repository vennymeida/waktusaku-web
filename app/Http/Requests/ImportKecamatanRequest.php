<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportKecamatanRequest extends FormRequest
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
            'import-file' => 'required|mimes:xlsx, csv, xls|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'import-file.mimes' => 'Incorrect excel file type',
            'import-file.required' => 'File Excel cannot be empty',
            'import-file.max' => 'Excel file more than 10mb',
        ];
    }
}