<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TripsSeeder;
use Database\Seeders\CitiesSeeder;
use Database\Seeders\StationsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CitiesSeeder::class,
            TripsSeeder::class,
            StationsSeeder::class
        ]);
    }
}
