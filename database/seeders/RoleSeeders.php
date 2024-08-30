<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "id" => 1,
            "role" => "admin",
        ]);
        Role::create([
            "id" => 2,
            "role" => "operator",
        ]);
        Role::create([
            "id" => 3,
            "role" => "approver",
        ]);
        Role::create([
            "id" => 4,
            "role" => "user",
        ]);
    }
}
