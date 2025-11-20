<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\JuiceController;
use App\Http\Controllers\JuiceFlavourController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MealplanController;
use App\Http\Controllers\MealplanRequestController;
use App\Http\Controllers\POrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin as isAdmin;

Route::get('/home', function () {
    return redirect('/dashboard');
});

Auth::routes();
Route::controller(HomeController::class)->group(function () { 
    Route::get('/','index');
    Route::get('/shop','shop');
    Route::get('/contact','contact');
    Route::get('/product/{id}','product');
    Route::post('/message','message');
    Route::get('/meal-plans','mealplan');
    Route::get('/mealplan-request','mealplan_request');
    Route::get('/healthy-juices','juices');
});
Route::resources([
    'mealplanrequest'=>MealplanRequestController::class,

]);
Route::middleware('auth')->group(function () {
    Route::resources([
        'carts'=>CartController::class,
        'orders'=>POrderController::class,
        'reviews'=>ReviewController::class,
        'mealplans'=>MealplanController::class,
        'ingredients'=>IngredientController::class,
        'juices'=>JuiceController::class,
        'flavour'=>JuiceFlavourController::class,
        'meals'=>MealController::class,
    ]);
    Route::middleware(isAdmin::class)->group(function () {
        Route::resources([
        'products'=>ProductController::class,
        'users'=>UserController::class,
        'tasks'=>TaskController::class,
        ]);
    });
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::get('/pay',function(){
        $redirect_url=request('redirect_url');
        return view('dashboard.pay', compact('redirect_url'));
    });
    Route::post('/v1/payment/update/',[POrderController::class,'updatePaymentStatus']);
    
});