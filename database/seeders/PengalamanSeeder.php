<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengalaman;
use Illuminate\Support\Facades\Hash;

class PengalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengalaman::create([
            'user_id'=> 3,
            'nama_pekerjaan'=> "Frontend Dev",
            'nama_perusahaan'=> "PT Hummasoft",
            'alamat'=> "Jl Bunga Merak No.12",
            'tipe'=> "Freelance",
            'gaji'=> "2000000",
            'tanggal_mulai'=> "2021-09-01",
            'tanggal_berakhir'=> "2021-09-30",
        ]);
        Pengalaman::create([
            'user_id'=> 3,
            'nama_pekerjaan'=> "Fullstack Dev",
            'nama_perusahaan'=> "PT Hummasoft Tech",
            'alamat'=> "Jl Bunga Merak No.13",
            'tipe'=> "Freelance",
            'gaji'=> "2000000",
            'tanggal_mulai'=> "2021-09-02",
            'tanggal_berakhir'=> "2021-09-29",
        ]);
    }
}
