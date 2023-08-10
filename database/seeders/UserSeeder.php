<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "SuperAdmin",
            'email' => "superadmin@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => "user",
            'email' => "user@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // User::factory()->count(10)->create();
        // User::create([
        //     'name' => "Pelamar",
        //     'email' => "pelamar@gmail.com",
        // ]);
        // User::create([
        //     'name' => "Perusahaan",
        //     'email' => "perusahaan@gmail.com",
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        // ]);
        // User::create([
        //     'name' => "Perusahaan",
        //     'email' => "perusahaan@gmail.com",
        //     'name' => "Pencari Kerja",
        //     'email' => "pencarikerja@gmail.com",
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        // ]);
        User::create([
            'name' => "Pelamar",
            'email' => "pelamar@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => "Perusahaan",
            'email' => "perusahaan@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}
