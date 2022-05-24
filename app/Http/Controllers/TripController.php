<?php

namespace App\Http\Controllers;

use App\Services\TripService;
use App\Http\Requests\AvailableTripRequest;
use App\Http\Resources\AvailableTripResource;

class TripController extends Controller
{
    protected $service;

    public function __construct(TripService $service)
    {
        $this->service = $service;
    }

    public function getAvailableTrips(AvailableTripRequest $request)
    {
        return AvailableTripResource::collection($this->service->getAvailableTrips($request->all()));
    }
}
