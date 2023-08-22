<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonPath = resource_path('js/data.json');
        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        foreach ($data as $categorySkills) {
            foreach ($categorySkills as $skill) {
                DB::table('keahlians')->insert([
                    'keahlian' => $skill['name'],
                ]);
            }
        }
    }
}