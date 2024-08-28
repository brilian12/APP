<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::create([
            "id" => 1,
            "gender" => "Male",
        ]);
        Gender::create([
            "id" => 2,
            "gender" => "Female",
        ]);
    }
}
