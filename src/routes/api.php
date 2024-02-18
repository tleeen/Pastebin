<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('/v1')
    ->group(function (){
        Route::prefix('/pastes')
            ->group(function (){
                Route::middleware('jwt.auth')
                    ->middleware('admin.api')
                    ->get('/', [PasteController::class, 'index']);
                Route::middleware('jwt.auth')
                    ->middleware('admin.api')
                    ->delete('/{id}', [PasteController::class, 'destroy']);
                Route::post('/', [PasteController::class, 'store']);
                Route::get('/all', [PasteController::class, 'getAll']);
                Route::get('/{id}', [PasteController::class, 'getById']);
                Route::get('/latest', [PasteController::class, 'latest']);
            });

        Route::prefix('/users')
            ->group(function (){
                Route::middleware('jwt.auth')
                    ->middleware('admin.api')
                    ->get('/', [UserController::class, 'index']);
                Route::middleware('jwt.auth')
                    ->middleware('admin.api')
                    ->delete('/{id}', [UserController::class, 'destroy']);
                Route::prefix('pastes')
                    ->group(function (){
                        Route::get('/', [UserController::class, 'getPastes']);
                        Route::get('/latest', [UserController::class, 'getLastPastes']);
                    });
            });

        Route::prefix('/complaints')
            ->group(function (){
                Route::middleware('jwt.auth')
                    ->middleware('admin.api')
                    ->get('/', [ComplaintController::class, 'index']);
                Route::post('/', [ComplaintController::class, 'store']);
            });

        Route::get('/types', [TypeController::class, 'index']);

        Route::get('/access_modifiers', [AccessModifierController::class, 'index']);

        Route::get('/expiration_times', [ExpirationTimeController::class, 'index']);

        Route::prefix('auth')
            ->middleware('api')
            ->group(function (){
                Route::post('login', [AuthController::class, 'login']);
                Route::post('logout', [AuthController::class, 'logout']);
                Route::post('refresh', [AuthController::class, 'refresh']);
                Route::post('user', [AuthController::class, 'user']);
            });

    });
