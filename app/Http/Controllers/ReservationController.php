<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationSeatRequest;
use App\Services\ReservationService;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    protected $service;

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
    }

    /** Store Reservation */
    public function store(ReservationSeatRequest $request): Response
    {
        $this->service->store($request->all());
        return response()->noContent(Response::HTTP_OK);
    }
}
