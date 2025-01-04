<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginateRequest;
use Exception;
use App\Models\Employee;
use App\Services\EmployeeService;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(PaginateRequest $request)
    {
        try {
            return EmployeeResource::collection($this->employeeService->list($request));
        } catch (Exception $exception) {
            return response(
                ["status" => false, "message" => $exception->getMessage()],
                422
            );
        }
    }

    public function show (Employee $employee) 
    {
        return new EmployeeResource($employee);
    }
}
