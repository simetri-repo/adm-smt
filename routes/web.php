<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;

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
    return view('auth.Login');
});

// user
Route::get('login', [MainController::class, 'login']);
Route::get('register', [MainController::class, 'register']);
Route::get('logout', [MainController::class, 'logout']);
Route::post('regist_save', [MainController::class, 'regist_save']);
Route::get('reset_password/{id}', [UserController::class, 'reset_password']);
Route::get('delete_user/{id}', [UserController::class, 'delete_user']);
Route::post('edit_user/{id}', [UserController::class, 'edit_user']);


//data
Route::get('dashboard', function () {
    return view('admin.Index');
});
Route::get('datauser', [UserController::class, 'datauser']);
Route::get('datanews', [NewsController::class, 'datanews']);
Route::get('dataproduct', [ProductController::class, 'dataproduct']);
Route::get('datacertificate', [CertificateController::class, 'datacertificate']);
Route::get('datacareer', [CareerController::class, 'datacareer']);

// berita
Route::post('add_berita', [NewsController::class, 'add_berita']);
Route::get('datanews_id/{id}', [NewsController::class, 'datanews_id']);
Route::post('update_berita/{id}', [NewsController::class, 'update_berita']);
Route::get('delete_news/{id}', [NewsController::class, 'delete_news']);

// produk
Route::post('add_produk', [ProductController::class, 'add_produk']);
Route::get('dataproduct_id/{id}', [ProductController::class, 'dataproduct_id']);
Route::post('update_produk/{id}', [ProductController::class, 'update_produk']);
Route::get('delete_product/{id}', [ProductController::class, 'delete_product']);

//certificate
Route::post('add_certificate', [CertificateController::class, 'add_certificate']);
Route::get('datacertificate_id/{id}', [CertificateController::class, 'datacertificate_id']);
Route::post('update_certificate/{id}', [CertificateController::class, 'update_certificate']);
Route::get('hapus_cert/{id}', [CertificateController::class, 'hapus_cert']);

//career
Route::post('add_career', [CareerController::class, 'add_career']);
Route::get('datacareer_id/{id}', [CareerController::class, 'datacareer_id']);
Route::post('update_career/{id}', [CareerController::class, 'update_career']);
Route::get('hapus_career/{id}', [CareerController::class, 'hapus_career']);
