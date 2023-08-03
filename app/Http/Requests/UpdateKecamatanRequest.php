<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKecamatanRequest extends FormRequest
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
        $id = $this->route('kecamatan')->id;
        return [
            'kecamatan' => 'required|regex:/^[a-zA-Z\s]+$/u|unique:kecamatans,kecamatan,' . $id
        ];
    }

    public function messages()
    {
        return [
            'kecamatan.required' => 'Data Kecamatan tidak boleh kosong',
            'kecamatan.unique' => 'Data Kecamatan sudah digunakan sebelumnya',
            'kecamatan.regex' => 'Data Kecamatan tidak boleh mengandung @!_?',
        ];
    }
}