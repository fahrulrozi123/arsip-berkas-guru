<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\ProfileController;


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

// Route::get('/', function () {
//     return view('login');
// }) ;

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/login-guru', [LoginController::class, 'guru'])->name('guru');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logoutguru', [LoginController::class, 'logoutguru'])->name('logoutguru');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::post('/loginguru', [LoginController::class, 'loginguru'])->name('loginguru');

Route::get('register/admin', [LoginController::class, 'regist'])->name('regist');
Route::post('register/storeadmin', [LoginController::class, 'storeadmin'])->name('store.admin');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    
    Route::get('akun', [LoginController::class, 'akun'])->name('akun');
    Route::get('akun/create', [LoginController::class, 'create'])->name('akun.create');
    Route::post('akun/store', [LoginController::class, 'store'])->name('akun.store');
    Route::get('akun/edit/{id}', [LoginController::class, 'edit'])->name('akun.edit');
    Route::post('akun/update/{id}', [LoginController::class, 'update'])->name('akun.update');
    Route::get('akun/destroy/{id}', [LoginController::class, 'destroy'])->name('destroy');

    Route::get('berkas/{username}/{file}', [DownloadController::class, 'lihatBerkasguru'])->name('lihat.berkasguru');
    Route::get('berkas/{file}', [DataGuruController::class, 'lihatBerkas'])->name('lihat.berkas');

    Route::get('upload-berkas', [DataGuruController::class, 'index'])->name('berkas');
    Route::get('upload/create', [DataGuruController::class, 'create'])->name('upload.create');
    Route::post('upload/store', [DataGuruController::class, 'store'])->name('upload.store');
    Route::get('upload/edit/{id}', [DataGuruController::class, 'edit'])->name('upload.edit');
    Route::post('upload/update/{id}', [DataGuruController::class, 'update'])->name('upload.update');
    Route::get('upload/destroy/{id}', [DataGuruController::class, 'destroy'])->name('destroy');

    Route::get('download-berkas', [DownloadController::class, 'index'])->name('index');
    Route::get('download/{id}', [DownloadController::class, 'download'])->name('download');

    Route::get('profile', [ProfileController::class, 'index'])->name('index');

});

require __DIR__.'/auth.php';
