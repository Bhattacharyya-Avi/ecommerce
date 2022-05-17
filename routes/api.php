<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/registration/post',[RegistrationController::class,'registrationPost']);

//login
Route::post('/login',[LoginController::class,'login']);

//category
Route::get('/categories',[CategoryController::class,'categories']);
//product
Route::get('/products',[ProductController::class,'products']);
Route::get('/product/view/slug',[ProductController::class,'productView']);
