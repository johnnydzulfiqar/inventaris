<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KepalaController;


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
//     return view('index');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/', [RuanganController::class, 'index'])->name('index');
    // Route::get('/home', [BarangController::class, 'index'])->name('index');
    Route::get('/ruangan/index', [RuanganController::class, 'index'])->name('index');
    Route::get('/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
    Route::post('/ruangan/create', [RuanganController::class, 'store']);
    Route::get('/ruangan/{ruangan}/edit', [RuanganController::class, 'edit'])->name(name: 'ruangan.edit');
    Route::patch('/ruangan/{ruangan}', [RuanganController::class, 'update'])->name(name: 'ruangan.update');
    Route::delete('/ruangan/{ruangan}', [RuanganController::class, 'destroy'])->name(name: 'ruangan.delete');
    Route::get('/ruangan/{ruangan}/show', [RuanganController::class, 'show'])->name('ruangan.show');
    Route::get('/barang/index', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/create', [BarangController::class, 'store']);
    Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name(name: 'barang.edit');
    Route::patch('/barang/{barang}', [BarangController::class, 'update'])->name(name: 'barang.update');
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name(name: 'barang.delete');
    Route::get('/barang/{barang}/show', [BarangController::class, 'show'])->name('barang.show');
    Route::post('/barang/{barang}/laporan', [BarangController::class, 'update_laporan']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/create', [AdminController::class, 'store']);
    Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name(name: 'admin.edit');
    Route::patch('/admin/{admin}', [AdminController::class, 'update'])->name(name: 'admin.update');
    Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name(name: 'admin.delete');
    Route::get('/admin/{admin}/show', [AdminController::class, 'show'])->name('admin.show');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:kepala'])->group(function () {

    // Route::get('/kepala/index', [KepalaController::class, 'index'])->name('kepala.index');
    // Route::get('/kepala/create', [KepalaController::class, 'create'])->name('kepala.create');
    // Route::post('/kepala/create', [KepalaController::class, 'store']);
    // Route::get('/kepala/{kepala}/edit', [KepalaController::class, 'edit'])->name(name: 'kepala.edit');
    // Route::patch('/kepala/{kepala}', [KepalaController::class, 'update'])->name(name: 'kepala.update');
    // Route::delete('/kepala/{kepala}', [KepalaController::class, 'destroy'])->name(name: 'kepala.delete');
    // Route::get('/kepala/{kepala}/show', [KepalaController::class, 'show'])->name('kepala.show');
    // Route::get('/', [RuanganController::class, 'index'])->name('index');
    // Route::get('/home', [BarangController::class, 'index'])->name('index');
    Route::get('/kepala/index', [BarangController::class, 'index'])->name('kepala.index');
    // Route::get('/kepala/create', [BarangController::class, 'create'])->name('kepala.create');
    // Route::post('/kepala/create', [BarangController::class, 'store']);
    Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name(name: 'barang.edit');
    Route::patch('/barang/{barang}', [BarangController::class, 'update'])->name(name: 'barang.update');
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name(name: 'barang.delete');
    Route::get('/barang/{barang}/show', [BarangController::class, 'show'])->name('barang.show');
    Route::post('/barang/{barang}/laporan', [BarangController::class, 'update_laporan']);
});
