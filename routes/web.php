<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function (){
    return view('signin');
})->name('login');

Auth::routes();
Route::post('insert_tags',[NewsController::class, 'storeTags'])->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth' ]
    ], function() { //...

    //===================spatie permitions  routes======================
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    //===================end spatie permitions  routes======================

    Route::resource('news', NewsController::class);


    Route::get('uploads/{id}',[NewsController::class, 'fileCreate']);
    Route::post('image/upload/store/{id}',[NewsController::class, 'fileStore'])->name('image/upload/store');
    Route::post('image/delete',[NewsController::class, 'fileDestroy']);


    /***********************dropzone******************************/

            //Route form displaying our form
            Route::get('/dropzoneform', [NewsController::class, 'dropzoneform']);

            //Rout for submitting the form datat
            Route::post('/storedata', [NewsController::class, 'storeData'])->name('form.data');

            //Route for submitting dropzone data
            Route::post('/storeimgae', [NewsController::class, 'storeImage']);
    /**********************************dropzone*******************/


    });
