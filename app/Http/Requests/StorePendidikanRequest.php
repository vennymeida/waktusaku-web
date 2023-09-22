<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendidikanRequest extends FormRequest
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
            'gelar' => 'nullable|in:SMA/SMK,D3,D4,S1,S2',
            'institusi' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'prestasi' => 'nullable|string|max:2000',
            'tahun_mulai' => 'nullable|in:2017,2018,2019,2020,2021,2022,2023,2024,2025,2026,2027,2028,2029',
            'tahun_berakhir' => 'nullable|in:2017,2018,2019,2020,2021,2022,2023,2024,2025,2026,2027,2028,2029,2030,Saat Ini',
            'ipk' => 'nullable|numeric|between:0,4'
        ];
    }

    public function messages()
    {
        return [
            'gelar.in' => 'Gelar Hanya Pada Pilihan',
            'institusi.max' => 'Nama Institusi Melebihi Batas Maksimal',
            'jurusan.max' => 'Nama Jurusan Melebihi Batas Maksimal',
            'prestasi.max' => 'Inputan Prestasi Melebihi Batas Maksimal',
            'tahun_mulai.in' => 'Tahun Hanya Pada Pilihan',
            'tahun_berakhir.in' => 'Tahun Hanya Pada Pilihan',
            'ipk.numeric' => 'Inputan IPK harus berupa angka',
            'ipk.between' => 'Inputan IPK harus berada dalam rentang 0 hingga 4',
        ];
    }
}
