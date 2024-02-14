<?php

use App\Http\Controllers\Auth\Social\Google\GoogleAuthController;
use App\Http\Controllers\Auth\Social\Yandex\YandexAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')
    ->middleware('guest')
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

<<<<<<< HEAD
Route::get('/all', function (){
    return view('posts.all');
})->name('posts.all');

Route::get('/create', function (){
    return view('posts.create');
})->name('posts.create');

Route::get('/user/posts', function (){
    return view('posts.user');
})->name('posts.user');

Route::get('/posts/index', function (){
    return view('posts.index');
})->name('posts.index');

Route::get('/complaints', function (){
    return view('complaints.create');
})->name('complaints.create');

=======
>>>>>>> dd45e6571d4dc077fd49887c58fe1d89052d3bb3
Auth::routes();
