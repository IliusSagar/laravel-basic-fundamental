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



// Route::get('/', function () {
//     return "<h1>Hello World!</h1>";
// });



// Route::get('/', function () {
//     return view('welcome');
// });


// Protected Middleware
Route::get('/', [DashboardController::class, 'index'])->middleware('guard');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('guard');
// --------------------------------------

Route::get('/feed', function () {
    return view('feed');
});

// Route::get('/profile', function () {
//     return view('users.profile');
// });


// Route::get('/pizzas', function () {
//     return view('pizzas',['type' => 'hawaiian', 'base' => 'cheesy crust']);
// });

Route::get('/pizzas', function () {

    $pizza = [
        'type' => 'hawaiian', 
        'base' => 'cheesy crust',
        'price' => 10
    ];

    return view('pizzas',$pizza );
});

Route::get('/login',function(){
    session()->put('user_id', 1);
    return redirect('/');

    // echo "<pre>";
    // print_r(session()->all());

   
});

Route::get('/logout', function(){
    session()->forget('user_id');
    return redirect('/');
});

Route::get('/no-access',function(){
    echo "You're not allowed to access the page!";
    die;
});