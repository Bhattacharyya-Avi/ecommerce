<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\LoginContrller;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect('admin/');
});

Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::controller(LoginContrller::class)->group(function(){
        Route::view('/','backend.login.login')->name('login');
        Route::post('/login/post','loginPost')->name('login.post');
    });

    Route::resource('categoris',CategoryController::class);
});

