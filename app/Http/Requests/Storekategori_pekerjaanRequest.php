<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storekategori_pekerjaanRequest extends FormRequest
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
            'kategori' => 'required|unique:kategori_pekerjaans,kategori|regex:/^[a-zA-Z]+$/u',
        ];
    }

    public function messages()
    {
        return [
            'kategori.required' => 'Data Kategori cannot be empty',
            'kategori.unique' => 'Data Kategori already exists',
            'kategori.regex' => 'Data Kategori cannot be characters @!_?',
        ];
    }
}
