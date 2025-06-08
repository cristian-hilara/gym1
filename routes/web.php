<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;

use App\Http\Controllers\Auth\homeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[homeController::class,'index'])-> name('panel')->middleware('auth');


Route::get('/login',[loginController::class,'index'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Route::get('/', function(){

//    return view('template');

//});

//Route::view('/panel', 'panel.index')-> name('panel');

Route::resource('usuarios', App\Http\Controllers\UsuarioController::class)->middleware('auth');
Route::resource('roles', App\Http\Controllers\roleController::class);


Route::get('/401', function(){
   return view('pages.401');
});

Route::get('/404', function(){
   return view('pages.404');
});

Route::get('/500', function(){
   return view('pages.500');
});





