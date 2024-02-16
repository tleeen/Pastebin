<?php

use App\Http\Controllers\Auth\Social\Google\GoogleAuthController;
use App\Http\Controllers\Auth\Social\Yandex\YandexAuthController;
use App\Http\Controllers\PasteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::middleware('admin')
    ->get('/', function () {
    return view('welcome');
});

Route::prefix('auth')
    ->middleware('guest')
    ->middleware('admin')
    ->group(function (){
        Route::prefix('/google')
            ->group(function (){
                Route::get('/', [GoogleAuthController::class, 'showLoginForm'])->name('auth.google');
                Route::get('/callback', [GoogleAuthController::class, 'login']);
            });
        Route::prefix('/yandex')
            ->group(function (){
                Route::get('/', [YandexAuthController::class, 'showLoginForm'])->name('auth.yandex');
                Route::get('/callback', [YandexAuthController::class, 'login']);
            });
});

Route::prefix('pastes')
    ->middleware('admin')
    ->group(function (){
        Route::get('/', [PasteController::class, 'index'])
        ->name('pastes.index');

        Route::get('/create', function (){
            return view('pastes.create');
        })->name('pastes.create');

        Route::get('/id', function (){
            return view('pastes.show');
        })->name('pastes.show');
    });

Route::prefix('users')
    ->middleware('admin')
    ->group(function (){
        Route::get('/id/pastes', function (){
            return view('users.pastes');
        })->name('users.pastes');
    });

Route::prefix('complaints')
    ->middleware('admin')
    ->group(function (){
        Route::get('/create', function (){
            return view('complaints.create');
        })->name('complaints.create');
    });

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
