<?php

use Illuminate\Support\Facades\Route;
use App\Domains\Auth\Http\Controllers\AuthController;
use App\Domains\Users\Http\Controller\UserController;
use App\Domains\Sports\Http\Controller\SportController;
use App\Domains\Subscriptions\Http\Controllers\PlanController;
use App\Domains\Subscriptions\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('v1/auth')->group(function () {

    Route::post('/', [AuthController::class, 'login']);
});

Route::prefix('v1/auth')->group(function () {

    Route::post('/', [AuthController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
});

Route::prefix('v1/users')->middleware('auth:sanctum')->group(function () {

    Route::get('/{id}', [UserController::class, 'get'])->where(["id" => "[0-9]+"]);
    Route::get('/{email}', [UserController::class, 'getByEmail'])->where('slug', '[A-Za-z0-9\_-]+');
    Route::get('/', [UserController::class, 'list']);
});

Route::prefix('v1/sport')->group(function () {

    Route::get('/', [SportController::class, 'list']);
    Route::get('/{id}', [SportController::class, 'get']);
    Route::post('/', [SportController::class, 'create']);
    Route::put('/{id}', [SportController::class, 'update']);
    Route::delete('/{id}', [SportController::class, 'delete']);
});

Route::prefix('v1/plan')->middleware('auth:sanctum')->group(function () {

    Route::get('/', [PlanController::class, 'list']);
    Route::get('/{id}', [PlanController::class, 'get']);
    Route::post('/', [PlanController::class, 'create']);
    Route::put('/{id}', [PlanController::class, 'update']);
    Route::delete('/{id}', [PlanController::class, 'delete']);
});

Route::prefix('v1/subscription')->group(function () {

    Route::get('/', [SubscriptionController::class, 'list']);
    Route::get('/{id}', [SubscriptionController::class, 'get']);
    Route::get('/user/{id}', [SubscriptionController::class, 'getByUserId']);
    Route::post('/', [SubscriptionController::class, 'create']);
    Route::put('/{id}', [SubscriptionController::class, 'update']);
    Route::delete('/{id}', [SubscriptionController::class, 'delete']);
});
