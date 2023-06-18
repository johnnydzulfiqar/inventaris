<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/', [RuanganController::class, 'index'])->name('index');
    Route::get('/home', [BarangController::class, 'index'])->name('index');
    Route::get('/ruangan/index', [RuanganController::class, 'index'])->name('index');
    Route::get('/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
    Route::post('/ruangan/create', [RuanganController::class, 'store']);
    Route::get('/ruangan/{ruangan}/edit', [RuanganController::class, 'edit'])->name(name: 'ruangan.edit');
    Route::patch('/ruangan/{ruangan}', [RuanganController::class, 'update'])->name(name: 'ruangan.update');
    Route::delete('/ruangan/{ruangan}', [RuanganController::class, 'destroy'])->name(name: 'ruangan.delete');
    Route::get('/ruangan/{ruangan}/show', [RuanganController::class, 'show'])->name('ruangan.show');
    Route::get('/barang/index', [BarangController::class, 'index'])->name('barang.index');
    // Route::get('/barang/indexkeluar', [BarangController::class, 'indexkeluar'])->name('barang.indexkeluar');
    Route::get('/barang/indexpending', [BarangController::class, 'indexpending'])->name('barang.indexpending');
    Route::get('/barang/indexreject', [BarangController::class, 'indexreject'])->name('barang.indexreject');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/create', [BarangController::class, 'store']);
    Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name(name: 'barang.edit');
    Route::patch('/barang/{barang}', [BarangController::class, 'update'])->name(name: 'barang.update');
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name(name: 'barang.delete');
    Route::get('/barang/{barang}/show', [BarangController::class, 'show'])->name('barang.show');
    Route::post('/barang/{barang}/laporan', [BarangController::class, 'update_laporan']);
    Route::get('/keluar/index', [KeluarController::class, 'index'])->name('keluar.index');
    // Route::get('/keluar/create', [KeluarController::class, 'create'])->name('keluar.create');
    // Route::post('/keluar/create', [KeluarController::class, 'store']);
    Route::get('/keluar/{keluar}/edit', [KeluarController::class, 'edit'])->name(name: 'keluar.edit');
    Route::patch('/keluar/{keluar}', [KeluarController::class, 'update'])->name(name: 'keluar.update');
    // Route::get('/keluar/{keluar}/show', [KeluarController::class, 'show'])->name('keluar.show');
    Route::get('/keluar/{keluar}/show2', [KeluarController::class, 'show2'])->name('keluar.show2');
    Route::post('/keluar/{keluar}/laporan', [KeluarController::class, 'update_laporan']);
    Route::delete('/keluar/{keluar}', [KeluarController::class, 'destroy'])->name(name: 'keluar.delete');
    Route::get('/barang/filter', [BarangController::class, 'filter']);
    Route::get('/barang/filterpending', [BarangController::class, 'filterpending']);
    Route::get('/barang/filterreject', [BarangController::class, 'filterreject']);
    Route::get('/keluar/filter', [KeluarController::class, 'filter']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('index');
    Route::get('/admin/index', [AdminController::class, 'index'])->name('index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/create', [AdminController::class, 'store']);
    Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name(name: 'admin.edit');
    Route::patch('/admin/{admin}', [AdminController::class, 'update'])->name(name: 'admin.update');
    Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name(name: 'admin.delete');
    Route::get('/admin/{admin}/show', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/filter', [AdminController::class, 'filter']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:kepala'])->group(function () {


    Route::get('/kepala/index', [BarangController::class, 'index'])->name('kepala.index');
    Route::get('/keluar2/index', [KeluarController::class, 'index'])->name('keluar.index');
    // Route::get('/kepala/indexkeluar', [BarangController::class, 'indexkeluar'])->name('barang.indexkeluar');
    Route::get('/kepala/{barang}/show', [BarangController::class, 'show'])->name('barang.show');
    Route::post('/barang/{barang}/laporan', [BarangController::class, 'update_laporan']);
    Route::get('/kepala/{keluar}/show', [KeluarController::class, 'show2'])->name('keluar.show2');
    Route::get('/kepala/cetak_pdf', [BarangController::class, 'cetak_pdf']);
    Route::get('/kepala/cetak_pdf2', [BarangController::class, 'cetak_pdf2']);
    Route::post('/keluar/{keluar}/laporan', [KeluarController::class, 'update_laporan']);
    Route::get('/dashboard2', [DashboardController::class, 'index'])->name('dashboard2.index');
});

Route::middleware(['auth', 'user-access:guru'])->group(function () {
    Route::get('/guru/index', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/indexkeluar', [GuruController::class, 'indexkeluar'])->name('guru.indexkeluar');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru/create', [GuruController::class, 'store']);
    Route::get('/guru/{barang}/show', [BarangController::class, 'show'])->name('barang.show');
    Route::get('/guru/{guru}/show2', [KeluarController::class, 'show2'])->name('keluar.show2');
    Route::get('/keluar/{keluar}/show', [KeluarController::class, 'show'])->name('keluar.show');
    Route::get('/keluar/create', [KeluarController::class, 'create'])->name('keluar.create');
    Route::post('/keluar/create', [KeluarController::class, 'store']);
    Route::get('/guru/filter', [GuruController::class, 'filter']);
    Route::get('/guru/filterkeluar', [GuruController::class, 'filterkeluar']);
});
Auth::routes();
