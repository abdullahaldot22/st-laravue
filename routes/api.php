<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix("employee")
    ->name("employee.")
    ->group(function () {
        Route::get("/", [EmployeeController::class, "index"]);
        Route::get("/show/{employee}", [EmployeeController::class, "show"]);
});

Route::prefix("user")
    ->name("user.")
    ->group(function () {
        Route::get("/", [UserController::class, "index"]);
        Route::get("/show/{user}", [UserController::class, "show"]);
        Route::post('/', [UserController::class, 'store']);
        Route::match(['put', 'patch'], '/update/{user}', [UserController::class, 'update']);
    });
