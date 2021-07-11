<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NelayanController;
use app\models\NelayanModel;
use App\Http\Controllers\KonsumenController;
use app\models\KonsumenModel;
use App\Http\Controllers\MitraController;
use app\models\MitraModel;


/*

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

Route::get('/',[HomeController::class,'index']);
Route::get('/nelayan',[NelayanController::class,'index'])->name('nelayan');
Route::get('/nelayan/detail/{id_nelayan}',[NelayanController::class,'detail']);
Route::get('/nelayan/add',[NelayanController::class,'add']);
Route::post('/nelayan/insert',[NelayanController::class,'insert']);
Route::get('/nelayan/edit/{id_nelayan}',[NelayanController::class,'edit']);
Route::post('/nelayan/update/{{id_nelayan}}',[NelayanController::class,'update']);
Route::get('/mitra',[MitraController::class,'index']);
Route::get('/konsumen',[KonsumenController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
