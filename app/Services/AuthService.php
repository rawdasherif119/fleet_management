<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\UserRepository;


class AuthService extends BaseService
{
    protected $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }
}
