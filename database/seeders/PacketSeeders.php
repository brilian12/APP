<?php

namespace Database\Seeders;

use App\Models\Packet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacketSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Packet::create([
            "id" => 1,
            "name" => "Gold",
            "price" => 250000,
        ]);

        Packet::create([
            "id" => 2,
            "name" => "Silver",
            "price" => 150000,
        ]);

        Packet::create([
            "id" => 3,
            "name" => "Gold",
            "price" => 1000000,
        ]);
    }
}
