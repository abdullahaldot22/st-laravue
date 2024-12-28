<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Requests\PaginateRequest;
use App\Models\User;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(PaginateRequest $request)
    {
        // dd($this->userService->list($request)->toArray());
        try {
            return UserResource::collection($this->userService->list($request));
        } catch (Exception $exception) {
            return response(
                ["status" => false, "message" => $exception->getMessage()],
                422
            );
        }
    }

    public function show (User $user)
    {
        try {
            return new UserResource($user);
        } catch (Exception $exception) {
            return response(
                ["status" => false, "message" => $exception->getMessage()],
                422
            );
        }
    }
}
