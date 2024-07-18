<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/id', [PageController::class, 'home_id']);

Route::get('/login-page', [PageController::class, 'loginPage']);
Route::get('/login-page/id', [PageController::class, 'loginPage_id']);


Route::get('/register-page', [PageController::class, 'registerPage']);
Route::get('/register-page/id', [PageController::class, 'registerPage_id']);

Route::post('/register-page', [AuthController::class, 'registerMethod']);

Route::post('/login-page', [AuthController::class, 'loginMethod']);
Route::post('/login-page/id', [AuthController::class, 'loginMethod_id']);

Route::get('/alert', [PageController::class, 'alertPage']);
Route::get('/alert/id', [PageController::class, 'alertPage_id']);

Route::get('/{locale}/language', [PageController::class, 'languagePage']);

Route::middleware(['auth'])->group(function(){
    Route::get('/search', [PageController::class, 'search']);


    Route::get('/detail/{item_id}', [PageController::class, 'detail']);
    Route::get('/detail/id/{item_id}', [PageController::class, 'detail_id']);

    Route::get('/cart', [PageController::class, 'cartPage']);
    Route::get('/cart/id', [PageController::class, 'cartPage_id']);

    Route::get('/profile', [PageController::class, 'profilePage']);
    Route::get('/profile/id', [PageController::class, 'profilePage_id']);
    
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::post('/update_profile', [AuthController::class, 'updateProfileMethod']);
    Route::post('/update_profile/id', [AuthController::class, 'updateProfileMethod_id']);
    
    Route::post('/add-to-cart/{item_id}', [ItemController::class, 'addToCart']);
    Route::post('/delete-from-cart/{item_id}', [ItemController::class, 'deleteFromCart']);
    Route::post('/checkout', [ItemController::class, 'checkout']);


    Route::middleware(['admin'])->group(function(){
        Route::get('/account-maintenance', [PageController::class, 'accountMaintenancePage']);
        Route::get('/account-maintenance/id', [PageController::class, 'accountMaintenancePage_id']);

        Route::get('/update-role/{user_id}', [PageController::class, 'updateRolePage']);
        Route::get('/update-role/id/{user_id}', [PageController::class, 'updateRolePage_id']);

        
        Route::post('/delete-user/{user_id}/{flag}', [AuthController::class, 'deleteUserMethod']);
        Route::post('/update-role/{user_id}', [AuthController::class, 'updateRoleMethod']);
    });

});