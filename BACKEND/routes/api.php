<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Data_OrangtuaController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\BeritaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('/create/create', BeritaController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware('guest')->post('/role', [RolesController::class, 'store']);

Route::post('/roles', [RolesController::class, 'store']);
Route::get('/roles', [RolesController::class, 'index']);
Route::delete('/roles/{id}', [RolesController::class, 'destroy']);
Route::put('/roles/{id}', [RolesController::class, 'update']);
Route::get('/getroles', [RolesController::class, 'getRoles']);


// Route untuk index (GET /data_orangtua)
Route::get('/data_orangtua', [Data_OrangtuaController::class, 'index']);
Route::post('/data_orangtua', [Data_OrangtuaController::class, 'store']);
Route::get('/data_orangtua/{id}', [Data_OrangtuaController::class, 'show']);
Route::match(['put', 'patch'], '/data_orangtua/{id}', [Data_OrangtuaController::class, 'update']);
Route::delete('/data_orangtua/{id}', [Data_OrangtuaController::class, 'destroy']);



// Route untuk index (GET /penimbangans)
Route::get('/penimbangans', [PenimbanganController::class, 'index']);
Route::post('/penimbangans', [PenimbanganController::class, 'store']);
// Route untuk show (GET /penimbangans/{id})
Route::get('/penimbangans/{id}', [PenimbanganController::class, 'show']);
Route::match(['put', 'patch'], '/penimbangans/{id}', [PenimbanganController::class, 'update']);
Route::delete('/penimbangans/{id}', [PenimbanganController::class, 'destroy']);


Route::get('/posyandu', [PosyanduController::class, 'index']);
Route::get('/posyandu/{id}', [PosyanduController::class, 'show']);
Route::post('/posyandu', [PosyanduController::class, 'store']);
Route::put('/posyandu/{id}', [PosyanduController::class, 'update']);
Route::delete('/posyandu/{id}', [PosyanduController::class, 'destroy']);

Route::apiResource('beritas', BeritaController::class);
Route::get('/beritas', [BeritaController::class, 'index']);    // Menampilkan daftar semua berita
Route::post('/beritas', [BeritaController::class, 'store']);   // Menyimpan berita baru
Route::get('/beritas/{id}', [BeritaController::class, 'show']);  // Menampilkan detail berita tertentu
Route::put('/beritas/{id}', [BeritaController::class, 'update']); // Memperbarui berita tertentu
Route::patch('/beritas/{id}', [BeritaController::class, 'update']); // Memperbarui berita tertentu
Route::delete('/beritas/{id}', [BeritaController::class, 'destroy']); // Menghapus berita tertentu