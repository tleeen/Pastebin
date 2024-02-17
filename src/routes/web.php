<?php

use App\Http\Controllers\AccessModifierController;
use App\Http\Controllers\Auth\Social\Google\GoogleAuthController;
use App\Http\Controllers\Auth\Social\Yandex\YandexAuthController;
use App\Http\Controllers\ExpirationTimeController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\TypeController;
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
    ->get('/', function () {
    return view('welcome');
});

Route::middleware('admin')
    ->get('/ok', function () {
        return view('ok');
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
            $pasteController = app()->make(PasteController::class);
            $lastPastes = $pasteController->last();

            $userController = app()->make(UserController::class);
            $lastPastesUser = null;
            if(auth()->user()){
                $lastPastesUser = $userController->lastPastes(auth()->user()->id);
            }

            $typeController = app()->make(TypeController::class);
            $types = $typeController->index();

            $accessModifierController = app()->make(AccessModifierController::class);
            $accessModifiers = $accessModifierController->index();

            $expirationTimeController = app()->make(ExpirationTimeController::class);
            $expirationTimes = $expirationTimeController->index();

            return view('pastes.create', compact('lastPastes', 'lastPastesUser', 'types', 'accessModifiers', 'expirationTimes'));
        })->name('pastes.create');

        Route::get('/{id}', [PasteController::class, 'show'])
            ->name('pastes.show');

        Route::post('/store', [PasteController::class, 'store'])
            ->name('pastes.store');
    });

Route::prefix('users')
    ->middleware('admin')
    ->group(function (){
        Route::get('/{id}/pastes', [UserController::class, 'pastes'])
            ->name('users.pastes');
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
