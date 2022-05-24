<?php

namespace App\Repositories;

use App\Enums\BusSeats;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Collection;

class TripRepository extends BaseRepository
{
    protected $filter = null;

    /**
     *  Return the model
     */
    public function model(): string
    {
        return Trip::class;
    }

    /**
     * Get Available Trips Between Cities
     */
    public function getAvailableTrips($data): Collection
    {
        $trips = $this->model->tripsContainStartAndEndCities($data['start_city_id'], $data['end_city_id'])->get();
        foreach ($trips as $trip) {
            $seats = $trip->reservations->unique('seat');
            if ($seats->count() < Trip::BUS_SEATS) {
                $trip['availableSeats'] = array_diff(BusSeats::getValues(), $seats->pluck('seat')->toArray());
            } else {
                $trip['start_order']    = $trip->stations()->where('start_city_id', $data['start_city_id'])->first()->order;
                $trip['availableSeats'] = $trip->reserved_seats->countBy()->reject(function ($value) {
                    return $value != 1;
                })->keys();
            }
        }
        return $trips;
    }

}
