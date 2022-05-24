<?php

namespace App\Services;

use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use App\Resources\ErrorResource;
use App\Services\BaseService;
use Illuminate\Http\Response;

class ReservationService extends BaseService
{
    protected $repo;

    public function __construct(ReservationRepository $repo)
    {
        $this->repo = $repo;
    }

    /** Store Reservation */
    public function store($data): Reservation
    {
        $availableTrips = App(TripService::class)->getAvailableTrips($data)->only($data['trip_id'])->first();
        if (is_null($availableTrips)) {
            abort(new ErrorResource(Response::HTTP_BAD_REQUEST, __('errors.no_available_trips')));
        }
        if (!in_array($data['seat'], $availableTrips->availableSeats)) {
            abort(new ErrorResource(Response::HTTP_BAD_REQUEST, __('errors.not_available_seat')));
        }
        return $this->repo->create(
            array_merge($data, [
                'user_id'     => auth()->user()->id,
                'start_order' => $availableTrips->start_order,
                'end_order'   => $availableTrips->end_order,
            ])
        );
    }
}
