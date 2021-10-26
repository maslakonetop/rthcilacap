<?php

use App\Models\Jenisrth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DatarthController;
use App\Http\Controllers\JenisrthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\RthModelController;
use App\Http\Controllers\StatuslahanController;
use App\Models\Datarth;

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

Route::get('/', [BerandaController::class, 'index']);
Route::get('/map', [MapController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/data', [DatarthController::class, 'index'])->middleware('auth');
Route::get('/data/create', [DatarthController::class, 'create'])->middleware('auth');
Route::post('/data', [DatarthController::class, 'store'])->middleware('auth');
Route::get('/data/{datarth}', [DatarthController::class, 'show'])->middleware('auth');
Route::get('/data/{datarth}/edit', [DatarthController::class, 'edit'])->middleware('auth');
Route::put('/data/{datarth}', [DatarthController::class, 'update'])->middleware('auth');
Route::delete('/data/{datarth}', [DatarthController::class, 'destroy'])->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/kecamatan', KecamatanController::class)->middleware('auth');
Route::resource('/lahan', StatuslahanController::class)->middleware('auth');
Route::get('map/{id}', [MapController::class, 'show']);
Route::resource('/jenis', JenisrthController::class)->middleware('auth');
Route::resource('/status', StatuslahanController::class)->middleware('auth');
Route::resource('/desa', DesaController::class)->middleware('auth');
Route::get('/document', [BerandaController::class, 'dokumen'])->middleware('auth');
Route::get('/about', [BerandaController::class, 'about'])->middleware('auth');
