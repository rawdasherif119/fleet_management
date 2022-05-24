<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @param  StoreUserRequest  $request
     */
    public function register(StoreUserRequest $request): Response
    {
        $this->service->create($request->all());
        return response()->noContent(Response::HTTP_OK);
    }
}
