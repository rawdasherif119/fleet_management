<?php

namespace App\Repositories;

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
    public function tripsContainStartAndEndCities($data): Collection
    {
        return $this->model->tripsContainStartAndEndCities(
            $data['start_city_id'], $data['end_city_id']
        )->get();

    }

}
