<?php

use App\Domains\Users\Http\Controller\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/users')->middleware('auth:sanctum')->group(function () {

Route::get('/{id}', [UserController::class, 'get'])->where(["id" => "[0-9]+"]);
Route::get('/{slug}', [UserController::class, 'getByEmail'])->where('slug', '[A-Za-z0-9\_-]+');

});