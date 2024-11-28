<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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



// Protected Middleware
Route::middleware(['guard'])->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
});

// --------------------------------------

Route::get('/login',function(){
    session()->put('user_id', 1);
    return redirect('/');
});

Route::get('/logout', function(){
    session()->forget('user_id');
    return redirect('/');
});

Route::get('/no-access',function(){
    echo "You're not allowed to access the page!";
    die;
});





