<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Naufal Alfadhil',
            'NIM' => '2019302009',
            'email' => 'nfalldh@gmail.com',
            'jurusan' => 'Teknologi Informasi',
            'is_admin' => true,
        ]);

        User::factory()->count(10)->create();
    }
}
