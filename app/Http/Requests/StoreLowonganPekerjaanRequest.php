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
            'id_kategori' => 'required|array|min:1',
            'judul' => 'required|regex:/^[A-Za-z\s]+$/',
            'deskripsi' => 'required',
            'requirement' => 'required',
            'tipe_pekerjaan' => 'required',
            'min_pendidikan' => 'required',
            'min_pengalaman' => 'required',
            'gaji_bawah' => 'required',
            'gaji_atas' => 'required',
            'jumlah_pelamar' => 'required',
            'tutup' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_kategori.required' => 'Kategori tidak boleh kosong',
            'id_kategori.min' => 'Pilih setidaknya satu kategori',
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.regex' => 'Judul tidak boleh mengandung selain huruf',
            'deskripsi.required' => 'Diskripsi tidak boleh kosong',
            'requirement.required' => 'Persyaratan tidak boleh kosong',
            'tipe_pekerjaan.required' => 'Tipe Pekerjaan tidak boleh kosong',
            'min_pendidikan.required' => 'Minimal Pendidikan tidak boleh kosong',
            'min_pengalaman.required' => 'Minimal Pengalaman tidak boleh kosong',
            'gaji_bawah.required' => 'Gaji tidak boleh kosong',
            'gaji_atas.required' => 'Gaji tidak boleh kosong',
            'jumlah_pelamar.required' => 'Jumlah Pelamar tidak boleh kosong',
            'tutup.required' => 'Lowongan di tutup tidak boleh kosong',
        ];
    }
}