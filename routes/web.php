<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\assetcate;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });
Route::get('/addasset',function(){
    return view('addasset');
});
Route::get('/addcate',function(){
    return view('addcate');
});
Route::post('/insert',[assetcate::class,'insert']);//insert Addassets
Route::get('/showass',[assetcate::class,'showass']);//show assets
Route::get('/editass/{id}',[assetcate::class,'editass']);//edit
Route::get('/del/{id}',[assetcate::class,'del']);//delete
Route::post('/update',[assetcate::class,'update']);//update

Route::get('/addcate',[assetcate::class,'addcate']);//add category
Route::post('/insertcate',[assetcate::class,'insertcate']);//insert categor
Route::get('/showcate',[assetcate::class,'showcate']);//show category
Route::get('/delcate/{id}',[assetcate::class,'delcate']);//delete category
Route::get('/editcate/{id}',[assetcate::class,'editcate']);//edit category
Route::post('/updatecate',[assetcate::class,'updatecate']);//update category

Route::get('/barchart',[assetcate::class,'barchart']);//barchart
Route::get('/dashboard',[assetcate::class,'index']);//dashboard
Route::get('/uploads/{id}',[assetcate::class,'uploads']);//upload image
Route::post('/insertimg',[assetcate::class,'insertimg']);//insert image
Route::get('/showimg/{id}',[assetcate::class,'showimg']);//show image



   
   




