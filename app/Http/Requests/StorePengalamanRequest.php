<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengalamanRequest extends FormRequest
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
            'nama_pekerjaan' => 'nullable|string|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|text|max:2000',
            'tipe' => 'nullable|in:Freelance, Part Time, Intership',
            'gaji' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_berakhir' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'nama_pekerjaan.max' => 'Inputan Nama Pekerjaan Melebihi Batas Maksimal',
            'nama_perusahaan.max' => 'Inputan Nama Perusahaan Melebihi Batas Maksimal',
            'alamat.max' => 'Inputan Alamat Melebihi Batas Maksimal',
            'tipe.in' => 'Inputan Tipe Hanya Pada Pilihan',
            'gaji.max' => 'Inputan Gaji Melebihi Batas Maksimal',
            'tanggal_mulai.date' => 'Pilih Tanggal',
            'tanggal_berakhir.date' => 'Pilih Tanggal',
        ];
    }
}
