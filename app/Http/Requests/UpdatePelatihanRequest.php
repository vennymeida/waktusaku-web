<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePelatihanRequest extends FormRequest
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
            'nama_sertifikat' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string|max:2000',
            'penerbit' => 'nullable|string|max:255',
            'tanggal_dikeluarkan' => 'nullable|date',
            'sertifikat' => 'nullable|file|mimes:pdf|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nama_sertifikat.max' => 'Inputan Nama Pelatihan/Sertifikat Melebihi Batas Maksimal',
            'deskripsi.max' => 'Inputan Deskripsi Melebihi Batas Maksimal',
            'penerbit.max' => 'Inputan Penerbit Melebihi Batas Maksimal',
            'tanggal_dikeluarkan.date' => 'Pilih Tanggal',
            'sertifikat.mimes' => 'Dokumen Hanya Mendukung Format pdf',
            'sertifikat.max' => 'Ukuran Dokumen Terlalu Besar',
        ];
    }
}
