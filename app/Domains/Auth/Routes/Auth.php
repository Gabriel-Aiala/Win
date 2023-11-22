<?php

use App\Domains\Users\Http\Controller\UserController;
use App\Domains\Auth\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/auth')->group(function () {

Route::post('/', [AuthController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);


});