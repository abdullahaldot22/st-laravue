<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\UserRequest;
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

    public function store(UserRequest $request): UserResource|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            return new UserResource($this->userService->store($request));
        } catch (Exception $exception) {
            return response(['status' => false, 'message' => $exception->getMessage()], 422);
        }
    }

    public function update(User $user, UserRequest $request): UserResource|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            return new UserResource($this->userService->update($user, $request));
        } catch (Exception $exception) {
            return response(['status' => false, 'message' => $exception->getMessage()], 422);
        }
    }

    public function delete(User $user) {
        try {
            $user->delete();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 422);
        }
    }
}
