<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLowonganPekerjaanRequest extends FormRequest
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
            'id_kategori' => 'required',
            'judul' => 'required|regex:/^[A-Za-z\s]+$/',
            'deskripsi' => 'required',
            'requirement' => 'required',
            'tipe_pekerjaan' => 'required',
            'gaji' => 'required',
            'jumlah_pelamar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_kategori.required' => 'Kategori tidak boleh kosong',
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.regex' => 'Judul tidak boleh mengandung selain huruf',
            'deskripsi.required' => 'Diskripsi tidak boleh kosong',
            'requirement.required' => 'Persyaratan tidak boleh kosong',
            'tipe_pekerjaan.required' => 'Tipe Pekerjaan tidak boleh kosong',
            'gaji.required' => 'Gaji tidak boleh kosong',
            'jumlah_pelamar.required' => 'Jumlah Pelamar tidak boleh kosong',
        ];
    }
}