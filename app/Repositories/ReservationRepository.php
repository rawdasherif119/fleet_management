<?php

namespace App\Repositories;

use App\Models\Reservation;


class ReservationRepository extends BaseRepository
{
    protected $filter = null ;

    /**
     *  Return the model
     */
    public function model() :string
    {
        return Reservation::class;
    }
}
