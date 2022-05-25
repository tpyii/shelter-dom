<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BreedController;
use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\InoculationController;
use App\Http\Controllers\Api\AnimalTypeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FavouritesController;
use App\Http\Controllers\Api\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    'breeds' => BreedController::class,
    'diseases' => DiseaseController::class,
    'inoculations' => InoculationController::class,
    'types' => AnimalTypeController::class,
    'users' => UsersController::class,
], [
    'parameters' => [
        'types' => 'animal_type',
    ]
]);

Route::middleware('checkSanctum')->group(function () {
    Route::apiResources([
        'animals' => AnimalController::class,
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'favourites' => FavouritesController::class,
    ], [
        'parameters' => [
            'favourites' => 'animal',
        ]
    ]);
});

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});
