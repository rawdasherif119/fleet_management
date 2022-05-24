<?php

namespace App\Services;

use App\Models\Trip;
use App\Enums\BusSeats;
use App\Services\BaseService;
use App\Repositories\TripRepository;
use Illuminate\Database\Eloquent\Collection;

class TripService extends BaseService
{
    protected $repo;

    public function __construct(TripRepository $repo)
    {
        $this->repo = $repo;
    }

    /** Check and get Available Trips Seats*/
    public function getAvailableTrips($data): Collection
    {
        //Trips Have these cities
        $trips = $this->repo->tripsContainStartAndEndCities($data);
        if ($trips->isNotEmpty()) {
            foreach ($trips as $trip) {
                //order of start and end cities in trip
                $trip['start_order'] = $trip->stations()->where('start_city_id', $data['start_city_id'])->first()->order;
                $trip['end_order']   = $trip->stations()->where('end_city_id', $data['end_city_id'])->first()->order;
                //Get available seats
                $seats               = $trip->reservations->unique('seat');
                if ($seats->count() < Trip::BUS_SEATS) {
                    $trip['availableSeats'] = array_diff(BusSeats::getValues(), $seats->pluck('seat')->toArray());
                } else {
                    $trip['availableSeats'] = $trip->reserved_seats->countBy()->reject(function ($value) {
                        return $value != 1;
                    })->keys();
                }
            }
        }
        return $trips;
    }
}
