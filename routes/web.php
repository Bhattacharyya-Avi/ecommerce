<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginContrller;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\RegistrationController;
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

// Route::controller(RegistrationController::class)->group(function(){
    
// });

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect('admin/');
});

Route::prefix('admin')->group(function(){
    Route::controller(LoginContrller::class)->group(function(){
        Route::view('/','backend.login.login')->name('login');
        Route::post('/login/post','loginPost')->name('login.post');
    });

    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('admin.dashboard');
    });

    Route::controller(SettingController::class)->group(function(){
        Route::get('/settings','settings')->name('setting');
        Route::put('/settings/{id}','settingsUpdate')->name('setting.update');
    });

    Route::resource('categoris',CategoryController::class);

    Route::controller(ProductController::class)->group(function(){
        Route::get('/products','list')->name('product.list');
        Route::post('/product/add','productAdd')->name('product.add');
        Route::get('/product/edit/{id}','productEdit')->name('product.edit');
        Route::put('/product/update/{id}','productupdate')->name('product.update');
        Route::get('/product/delete/{id}','productDelete')->name('product.delete');
        Route::get('/product/view/{id}','productView')->name('product.view');
    });
});

