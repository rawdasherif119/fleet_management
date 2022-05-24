<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvailableTripRequest;
use App\Http\Resources\AvailableTripResource;
use App\Services\TripService;
use Illuminate\Http\Resources\Json\JsonResource;

class TripController extends Controller
{
    protected $service;

    public function __construct(TripService $service)
    {
        $this->service = $service;
    }

    /** Get List of Available trips with seats between two cities */
    public function getAvailableTrips(AvailableTripRequest $request): JsonResource
    {
        return AvailableTripResource::collection($this->service->getAvailableTrips($request->all()));
    }
}
