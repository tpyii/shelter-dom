<?php

use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\Admin\BreedController as AdminBreedController;
use App\Http\Controllers\Admin\DiseaseController as AdminDiseaseController;
use App\Http\Controllers\admin\ImageController as AdminImageController;
use App\Http\Controllers\Admin\InoculationController as AdminInoculationController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\User\AboutMeController as UserAboutmeController;
use App\Http\Controllers\User\CommentsController as UserCommentsController;
use App\Http\Controllers\User\DonnationsController as UserDonnationsController;
use App\Http\Controllers\User\FavoritesController as UserFavoritesController;
use App\Http\Controllers\User\RequestsController as UserRequestsController;

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestImgUploadController;
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

Route::get('/catalog', [CatalogController::class, 'index'])
    ->name('catalog.index');

Route::get('/catalog/{id}', [CatalogController::class, 'show'])
    ->where('id', '\d+')
    ->name('catalog.show');

/*
 * Тут все роуты для андминки
 */
Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function (){
        Route::view('/', 'admin.dashboard')->name('dashboard');
        Route::resource('/breeds', AdminBreedController::class);
        Route::resource('/animal_types', AdminTypeController::class);
        Route::resource('/diseases', AdminDiseaseController::class);
        Route::resource('/inoculations', AdminInoculationController::class);
        Route::resource('/animals', AdminAnimalController::class);
        Route::resource('/img', TestImgUploadController::class);
        Route::resource('/users',   AdminUserController::class);
        Route::resource('/images', AdminImageController::class);
    });
    Route::group(['prefix' => 'user', 'as' => 'user.'], function (){
        Route::resource('/', UserController::class);
        Route::resource('/about_me', UserAboutmeController::class);
        Route::resource('/favorit_animals', UserFavoritesController::class);
        Route::resource('/donations', UserDonnationsController::class);
        Route::resource('/requests', UserRequestsController::class);
        Route::resource('/comments', UserCommentsController::class);
    });
});





// Тестовый роут для картинок
//Route::resource('/img', \App\Http\Controllers\TestImgUploadController::class);

Auth::routes();

// Тестовый роут для фронта

Route::any('{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');
