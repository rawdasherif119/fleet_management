<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = $this->getTrips();
        foreach ($trips as $trip) {
            Trip::firstOrCreate($trip);
        }
    }

    public function getTrips()
    {
        $cairoId = City::whereName('Cairo')->first()->id;
        return [
            1 => [
                'start_city_id' => $cairoId,
                'end_city_id'   => City::whereName('Asyut')->first()->id,
            ],
            2 => [
                'start_city_id' => City::whereName('Tanta')->first()->id,
                'end_city_id'   => City::whereName('Sohag')->first()->id,
            ],
            3 => [
                'start_city_id' => City::whereName('Marsa Matruh')->first()->id,
                'end_city_id'   => $cairoId,
            ],
        ];
    }
}
