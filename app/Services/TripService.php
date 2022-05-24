<?php

namespace App\Services;

use App\Models\Trip;
use App\Repositories\TripRepository;
use App\Services\BaseService;
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
        return $this->repo->getAvailableTrips($data);
    }
}
