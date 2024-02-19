<?php

use App\Http\Controllers\Auth\Social\Google\GoogleAuthController;
use App\Http\Controllers\Auth\Social\Yandex\YandexAuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\UserController;
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
    ->group(function (){
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/ok', function () {
                return view('ok');
        });

        Route::prefix('auth')
            ->middleware('guest')
            ->group(function (){
                Route::prefix('/google')
                    ->group(function (){
                        Route::get('/', [GoogleAuthController::class, 'showLoginForm'])
                            ->name('auth.google');

                        Route::get('/callback', [GoogleAuthController::class, 'login']);
                    });
                Route::prefix('/yandex')
                    ->group(function (){
                        Route::get('/', [YandexAuthController::class, 'showLoginForm'])
                            ->name('auth.yandex');

                        Route::get('/callback', [YandexAuthController::class, 'login']);
                    });
            });

        Route::prefix('pastes')
            ->group(function (){
                Route::get('/', [PasteController::class, 'index'])
                    ->name('pastes.index');

                Route::get('/create', [PasteController::class, 'create'])
                    ->name('pastes.create');

                Route::get('/{id}', [PasteController::class, 'show'])
                    ->name('pastes.show');

                Route::post('/store', [PasteController::class, 'store'])
                    ->name('pastes.store');

                Route::prefix('/{id}/complaints')
                    ->group(function (){
                        Route::get('/create', [ComplaintController::class, 'create'])
                            ->name('complaints.create');

                        Route::post('/store', [ComplaintController::class, 'store'])
                            ->name('complaints.store');
                    });
            });

        Route::prefix('users')
            ->group(function (){
                Route::get('/{id}/pastes', [UserController::class, 'pastes'])
                    ->name('users.pastes');
            });
    });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
