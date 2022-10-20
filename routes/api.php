<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('show_berita', [ApiController::class, 'show_berita']);
Route::get('show_produk', [ApiController::class, 'show_produk']);
Route::get('show_certificate', [ApiController::class, 'show_certificate']);
Route::get('show_berita', [ApiController::class, 'show_berita']);
Route::get('show_berita_hot', [ApiController::class, 'show_berita_hot']);
Route::get('show_berita_top', [ApiController::class, 'show_berita_top']);
