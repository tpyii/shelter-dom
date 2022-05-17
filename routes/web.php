<?php

use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\Admin\BreedController as AdminBreedController;
use App\Http\Controllers\Admin\DiseaseController as AdminDiseaseController;
use App\Http\Controllers\admin\ImageController as AdminImageController;
use App\Http\Controllers\Admin\InoculationController as AdminInoculationController;
use App\Http\Controllers\Admin\ProfilesController as AdminProfilesController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\User\AboutMeController as UserAboutMeController;
use App\Http\Controllers\User\CommentsController as UserCommentsController;
use App\Http\Controllers\User\DonationsController as UserDonationsController;
use App\Http\Controllers\User\FavouritesController as UserFavouritesController;
use App\Http\Controllers\User\RequestsController as UserRequestsController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('.');

/*
 * Тут все роуты для андминки
 */
Route::group([
    'middleware' => 'auth',
], function() {

    Route::group([
        'prefix' => 'admin', 
        'as' => 'admin.', 
        'middleware' => 'admin',
    ], function () {
        
        Route::view('/', 'admin.dashboard')->name('dashboard');
        Route::resource('/breeds', AdminBreedController::class);
        Route::resource('/animal_types', AdminTypeController::class);
        Route::resource('/diseases', AdminDiseaseController::class);
        Route::resource('/inoculations', AdminInoculationController::class);
        Route::resource('/animals', AdminAnimalController::class);
        Route::resource('/users',   AdminUserController::class);
        Route::resource('/images', AdminImageController::class);
        Route::resource('/profiles', AdminProfilesController::class);
        Route::delete('/avatar/{profile}', [AdminProfilesController::class, 'avatar'])->name('avatar.destroy');
    });

    Route::group([
        'prefix' => 'user', 
        'as' => 'user.',
    ], function () {
        
        Route::resource('/', UserController::class);
        Route::resource('/about_me', UserAboutMeController::class);
        Route::resource('/favourite_animals', UserFavouritesController::class)->parameters([
            'favourite_animals' => 'animal',
        ]);
        Route::resource('/donations', UserDonationsController::class);
        Route::resource('/requests', UserRequestsController::class);
        Route::resource('/comments', UserCommentsController::class);
    });
});

Auth::routes();

Route::any('{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');
