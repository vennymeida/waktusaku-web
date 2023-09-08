<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tahun')->insert([
            [
                'tahun' => 'Saat Ini',
            ],
            [
                'tahun' => '2025',
            ],
            [
                'tahun' => '2024',
            ],
            [
                'tahun' => '2023',
            ],
            [
                'tahun' => '2022',
            ],
            [
                'tahun' => '2021',
            ],
            [
                'tahun' => '2020',
            ],
            [
                'tahun' => '2019',
            ],
            [
                'tahun' => '2018',
            ],
            [
                'tahun' => '2017',
            ],
            [
                'tahun' => '2016',
            ],
            [
                'tahun' => '2015',
            ],
            [
                'tahun' => '2014',
            ],
            [
                'tahun' => '2013',
            ],
            [
                'tahun' => '2012',
            ],
            [
                'tahun' => '2011',
            ],
            [
                'tahun' => '2010',
            ],
            [
                'tahun' => '2009',
            ],
            [
                'tahun' => '2008',
            ],
            [
                'tahun' => '2007',
            ],
            [
                'tahun' => '2006',
            ],
            [
                'tahun' => '2005',
            ],
            [
                'tahun' => '2004',
            ],
            [
                'tahun' => '2003',
            ],
            [
                'tahun' => '2002',
            ],
            [
                'tahun' => '2001',
            ],
            [
                'tahun' => '2000',
            ],
        ]);
    }
}
