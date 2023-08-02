<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login',[AuthController::class,'login']); 
Route::post('register',[AuthController::class,'register']);




Route::middleware(['admin.api'])->prefix('admin')->group(function(){
    //table user
    Route::get('user',[AdminController::class,'index']);
    Route::get('cari/{id}',[AdminController::class,'cari']);
    Route::get('shop',[AdminController::class,'shop']);
    Route::get('costumer',[AdminController::class,'costumer']);
    Route::get('kurir',[AdminController::class,'kurir']);
    Route::get('banned',[AdminController::class,'banned']);
    Route::post('register',[AdminController::class,'register']);
    Route::put('ban/{id}',[AdminController::class,'ban']);
    Route::put('unban/{id}',[AdminController::class,'unban']);
    Route::delete('deleteUser/{id}',[AdminController::class,'userdelete']);


    //table produk
    Route::get('makanan',[AdminController::class,'makanan']);
    Route::get('minuman',[AdminController::class,'minuman']);
    Route::get('sold',[AdminController::class,'sold']);


    //menu complain
    Route::get('complain',[AdminController::class,'complain']);
});
