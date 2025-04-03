<?php
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register.create'); 
Route::post('/register', [RegisterController::class, 'store'])->name('register.store'); 