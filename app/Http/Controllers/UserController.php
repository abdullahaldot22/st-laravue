<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Requests\PaginateRequest;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(PaginateRequest $request)
    {
        try {
            return UserResource::collection($this->userService->list($request));
        } catch (Exception $exception) {
            return response(
                ["status" => false, "message" => $exception->getMessage()],
                422
            );
        }
    }
}
