<?php
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register.create'); 
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');



Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout.delete');


Route::get('/login', [SessionController::class, 'create'])->name('login.create');


Route::post('/login', [SessionController::class, 'store'])->name('login.store');

Route::get('/register', [RegisterController::class, "create"])->middleware("guest");

Route::get('/skats', [RegisterController::class, "create"])->middleware("auth");
