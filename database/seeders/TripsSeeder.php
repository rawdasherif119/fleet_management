<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = $this->getTrips();
        foreach ($trips as $trip) {
            Trip::firstOrCreate($trip);
        }
    }

    public function getTrips(): array
    {
        $cairoId = City::whereName('Cairo')->first()->id;
        return [
            1 => [
                'name'          => 'cairo|asyut',
                'start_city_id' => $cairoId,
                'end_city_id'   => City::whereName('Asyut')->first()->id,
            ],
            2 => [
                'name'          => 'tanta|suhag',
                'start_city_id' => City::whereName('Tanta')->first()->id,
                'end_city_id'   => City::whereName('Sohag')->first()->id,
            ],
            3 => [
                'name'          => 'matruh|cairo',
                'start_city_id' => City::whereName('Marsa Matruh')->first()->id,
                'end_city_id'   => $cairoId,
            ],
        ];
    }
}
