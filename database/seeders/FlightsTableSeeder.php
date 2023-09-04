<?php

namespace Database\Seeders;
use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    Flight::factory()->times(20)->create();
    }
}
