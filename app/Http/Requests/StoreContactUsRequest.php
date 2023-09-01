<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactUsRequest extends FormRequest
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
            'nama' => 'required|regex:/^[A-Za-z\s]+$/',
            'email' => 'required',
            'pesan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh di kosongkan',
            'nama.regex' => 'Nama tidak boleh mengandung selain huruf',
            'email.required' => 'Email tidak boleh dikosongkan',
            'pesan.required' => 'Harus ada pesan yang dimasukkan 😡',
        ];
    }
}