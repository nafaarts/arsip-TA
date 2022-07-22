<?php

namespace Database\Seeders;

use App\Models\TugasAkhir;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasAkhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('is_admin', 0)->get()->each(function (User $user) {
            TugasAkhir::factory()->create([
                'user_id' => $user->id,
                'status' => true,
            ]);
        });
    }
}
