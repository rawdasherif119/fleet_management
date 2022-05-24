<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Station;
use Illuminate\Database\Seeder;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = $this->getTrips();
        foreach ($trips as $trip) {
            foreach ($trip as $station) {
                Station::firstOrCreate($station);
            }
        }
    }

    public function getTrips(): array
    {
        $cairoId  = City::whereName('Cairo')->first()->id;
        $fayyumId = City::whereName('Fayyum')->first()->id;
        $minyaId  = City::whereName('al-Minya')->first()->id;
        $asyutId  = City::whereName('Asyut')->first()->id;
        $tantaId  = City::whereName('Tanta')->first()->id;
        $gizahId  = City::whereName('Gizeh')->first()->id;
        $sohagId  = City::whereName('Sohag')->first()->id;
        $matruhId = City::whereName('Marsa Matruh')->first()->id;
        $alexId   = City::whereName('Alexandria')->first()->id;

        return [
            1 => [
                [
                    'trip_id'       => 1,
                    'start_city_id' => $cairoId,
                    'end_city_id'   => $fayyumId,
                    'order'         => 1,
                ],
                [
                    'trip_id'       => 1,
                    'start_city_id' => $fayyumId,
                    'end_city_id'   => $minyaId,
                    'order'         => 2,
                ],
                [
                    'trip_id'       => 1,
                    'start_city_id' => $minyaId,
                    'end_city_id'   => $asyutId,
                    'order'         => 3,
                ],
            ],
            2 => [
                [
                    'trip_id'       => 2,
                    'start_city_id' => $tantaId,
                    'end_city_id'   => $gizahId,
                    'order'         => 1,
                ],
                [
                    'trip_id'       => 2,
                    'start_city_id' => $gizahId,
                    'end_city_id'   => $cairoId,
                    'order'         => 2,
                ],
                [
                    'trip_id'       => 2,
                    'start_city_id' => $cairoId,
                    'end_city_id'   => $asyutId,
                    'order'         => 3,
                ],
                [
                    'trip_id'       => 2,
                    'start_city_id' => $asyutId,
                    'end_city_id'   => $sohagId,
                    'order'         => 4,
                ],
            ],
            3 => [
                [
                    'trip_id'       => 3,
                    'start_city_id' => $matruhId,
                    'end_city_id'   => $alexId,
                    'order'         => 1,
                ],
                [
                    'trip_id'       => 3,
                    'start_city_id' => $alexId,
                    'end_city_id'   => $cairoId,
                    'order'         => 2,
                ],
            ],
        ];
    }
}
