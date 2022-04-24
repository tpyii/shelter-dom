<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BreedController;
use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\InoculationController;
use App\Http\Controllers\Api\AnimalTypeController;
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
    'animals' => AnimalController::class,
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
