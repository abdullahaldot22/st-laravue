<?php

namespace App\Services;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PaginateRequest;

class UserService
{
    public array $userFilter = ["name", "email", "phone"];

    public function list(PaginateRequest $request)
    {
        try {
            $requests = $request->all();
            $method = $request->get("paginate", 0) == 1 ? "paginate" : "get";
            $methodValue =
                $request->get("paginate", 0) == 1
                    ? $request->get("per_page", 10)
                    : "*";
            $orderColumn = $request->get("order_column") ?? "id";
            $orderType = $request->get("order_type") ?? "desc";

            return User::where(function ($query) use ($requests) {
                foreach ($requests as $key => $request) {
                    if (in_array($key, $this->userFilter)) {
                        $query->where($key, "like", "%" . $request . "%");
                    }
                }
            })
                ->orderBy($orderColumn, $orderType)
                ->$method($methodValue);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            throw new Exception($exception->getMessage(), 422);
        }
    }

    /**
     * @return array
     * @throws Exception
     */
    public function store(UserRequest $request)
    {
        try {
            return User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'password' => Hash::make($request->password)
            ]);
        } catch (Exception $exception) {
            Log::info($exception);
            throw new Exception($exception->getMessage(), 422);
        }
    }

    /**
     * @throws Exception
     */
    public function update(User $user, UserRequest $request): User
    {
        try {
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            return $user;
        } catch (Exception $exception) {
            Log::info($exception);
            throw new Exception($exception->getMessage(), 422);
        }
    }
}
