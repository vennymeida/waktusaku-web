<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKelurahanRequest extends FormRequest
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
        $id = $this->route('kelurahan')->id;
        return [
            'kelurahan' => 'required|regex:/^[a-zA-Z\s]+$/u|unique:kelurahans,kelurahan,' . $id,
            'id_kecamatan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_kecamatan.required' => 'Data Kecamatan tidak boleh kosong',
            'kelurahan.required' => 'Data Kelurahan tidak boleh kosong',
            'kelurahan.unique' => 'Data Kelurahan sudah digunakan sebelumnya',
            'kelurahan.regex' => 'Data Kelurahan tidak boleh mengandung @!_?',
        ];
    }
}