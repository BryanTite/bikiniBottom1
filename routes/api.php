<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\API\PurchaseController;

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

Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);
Route::post('logout',[UserController::class,'logout'])->middleware(['auth:sanctum']);


Route::group(['prefix' => 'tickets', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/', [TicketController::class, 'index']);
    Route::post('add', [TicketController::class, 'add']);

});

Route::post('cart/add/{product_id}', [PurchaseController::class,'addProduct']);
Route::get('cart', [PurchaseController::class,'showCart']);

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
