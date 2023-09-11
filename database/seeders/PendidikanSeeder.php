<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\Hash;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendidikan::create([
            'user_id'=> 3,
            'gelar'=> "D4",
            'institusi'=> "Politeknik Negeri Malang",
            'jurusan'=> "Teknik Informatika",
            'prestasi'=> "Mengikuti Lomba KMIPN",
            'tahun_mulai'=> "2019",
            'tahun_berakhir'=> "2021",
            'ipk'=> "3.45",
        ]);
        Pendidikan::create([
            'user_id'=> 3,
            'gelar'=> "D3",
            'institusi'=> "Universitas Brawijaya",
            'jurusan'=> "Teknik Informatika",
            'prestasi'=> "Mengikuti Lomba KMIPN",
            'tahun_mulai'=> "2017",
            'tahun_berakhir'=> "2021",
            'ipk'=> "3.46",
        ]);
        Pendidikan::create([
            'user_id'=> 3,
            'gelar'=> "S1",
            'institusi'=> "Universitas Padjajaran",
            'jurusan'=> "Teknik Informatika",
            'prestasi'=> "Mengikuti Lomba KMIPN",
            'tahun_mulai'=> "2020",
            'tahun_berakhir'=> "2021",
            'ipk'=> "3.47",
        ]);
    }
}
