<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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
    if(auth()->user()==null){
        return redirect('/login')->with('message', 'Please sign in to continue.');
    }
    else{
        return view('welcome');
    }
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::Class, 'authenticate']);
Route::get('/logout', [LoginController::Class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('peserta', PesertaController::class);
Route::resource('instruktur', InstrukturController::class);
Route::resource('kelas', KelasController::class);
Route::resource('laporan', LaporanController::class);  
Route::resource('user', UserController::class);  