<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customers::create([
            "id" => 1,
            "name" => "Brilian",
            "email" => "brilian@gmail.com",
        ]);

        Customers::create([
            "id" => 2,
            "name" => "Faqih",
            "email" => "faqih@gmail.com",
        ]);

        Customers::create([
            "id" => 3,
            "name" => "Dzikri",
            "email" => "dzikri@gmail.com",
        ]);

        Customers::create([
            "id" => 4,
            "name" => "Rico",
            "email" => "rico@gmail.com",
        ]);
    }
}
