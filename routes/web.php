<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;


use Illuminate\Support\Facades\Route;

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
Route::pattern('id', '[0-9]+'); // Parameter {id} harus berupa angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'store']);

// Group route yang memerlukan autentikasi
Route::middleware('auth')->group(function () {

    Route::get('/', [WelcomeController::class, 'index']);

    Route::group(['prefix' => 'user', 'middleware' => 'authorize:ADM,MNG'], function () {
        Route::get('/', [UserController::class, 'index']);  // Menampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']);  // Menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']);  // Menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']);  // Menyimpan data user baru
        Route::get('/create_ajax', [UserController::class, 'create_ajax']);  // Menampilkan halaman form tambah user ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']);  // Menyimpan data user baru ajax
        Route::get('/{id}', [UserController::class, 'show']);  // Menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']);  // Menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']);  // Menyimpan perubahan data user
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);  // Menampilkan form edit user ajax
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);  // Menyimpan perubahan data user ajax
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);  // Menampilkan form konfirmasi delete user Ajax
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);  // Menghapus data user Ajax
        Route::delete('/{id}', [UserController::class, 'destroy']);  // Menghapus data user
    });

    Route::group(['prefix' => 'level', 'middleware' => 'authorize:ADM'], function () {
        Route::get('/', [LevelController::class, 'index']);  // Menampilkan halaman awal level
        Route::post('/list', [LevelController::class, 'list']);  // Menampilkan data level dalam bentuk json untuk datatables
        Route::get('/create', [LevelController::class, 'create']);  // Menampilkan halaman form tambah level
        Route::post('/', [LevelController::class, 'store']);  // Menyimpan data level baru
        Route::get('/create_ajax', [LevelController::class, 'create_ajax']);  // Menampilkan form tambah level ajax
        Route::post('/ajax', [LevelController::class, 'store_ajax']);  // Menyimpan data level baru ajax
        Route::get('/{id}', [LevelController::class, 'show']);  // Menampilkan detail level
        Route::get('/{id}/edit', [LevelController::class, 'edit']);  // Menampilkan form edit level
        Route::put('/{id}', [LevelController::class, 'update']);  // Menyimpan perubahan data level
        Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);  // Menampilkan form edit level ajax
        Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);  // Menyimpan perubahan data level ajax
        Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);  // Menampilkan form konfirmasi delete level Ajax
        Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);  // Menghapus data level Ajax
        Route::delete('/{id}', [LevelController::class, 'destroy']);  // Menghapus data level
    });

    Route::group(['prefix' => 'barang', 'middleware' => 'authorize:ADM,MNG,STF'], function () {
        Route::get('/', [BarangController::class, 'index']);  // Menampilkan halaman awal barang
        Route::post('/list', [BarangController::class, 'list']);  // Menampilkan data barang dalam bentuk json untuk datatables
        Route::get('/create', [BarangController::class, 'create']);  // Menampilkan form tambah barang
        Route::post('/', [BarangController::class, 'store']);  // Menyimpan data barang baru
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']);  // Menampilkan form tambah barang ajax
        Route::post('/ajax', [BarangController::class, 'store_ajax']);  // Menyimpan data barang baru ajax
        Route::get('/{id}', [BarangController::class, 'show']);  // Menampilkan detail barang
        Route::get('/{id}/edit', [BarangController::class, 'edit']);  // Menampilkan form edit barang
        Route::put('/{id}', [BarangController::class, 'update']);  // Menyimpan perubahan data barang
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);  // Menampilkan form edit barang ajax
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);  // Menyimpan perubahan data barang ajax
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);  // Menampilkan form konfirmasi delete barang ajax
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);  // Menghapus data barang ajax
        Route::delete('/{id}', [BarangController::class, 'destroy']);  // Menghapus data barang 
        Route::get('/import', [BarangController::class, 'import']);  // Ajax form upload excel
        Route::post('/import_ajax', [BarangController::class, 'import_ajax']);  // Ajax import excel
        Route::get('/export_excel', [BarangController::class, 'export_excel']);      // export excel
        Route::get('/export_pdf',[BarangController::class,'export_pdf']); // export pdf

    });

    Route::group(['prefix' => 'kategori', 'middleware' => 'authorize:ADM,MNG,STF'], function () {
        Route::get('/', [KategoriController::class, 'index']);  // Menampilkan halaman awal kategori
        Route::post('/list', [KategoriController::class, 'list']);  // Menampilkan data kategori dalam bentuk json untuk datatables
        Route::get('/create', [KategoriController::class, 'create']);  // Menampilkan form tambah kategori
        Route::post('/', [KategoriController::class, 'store']);  // Menyimpan data kategori baru
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);  // Menampilkan form tambah kategori ajax
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);  // Menyimpan data kategori baru ajax
        Route::get('/{id}', [KategoriController::class, 'show']);  // Menampilkan detail kategori
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);  // Menampilkan form edit kategori
        Route::put('/{id}', [KategoriController::class, 'update']);  // Menyimpan perubahan data kategori
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);  // Menampilkan form edit kategori ajax
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);  // Menyimpan perubahan data kategori ajax
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);  // Menampilkan form konfirmasi delete kategori ajax
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);  // Menghapus data kategori ajax
        Route::delete('/{id}', [KategoriController::class, 'destroy']);  // Menghapus data kategori
    });

    Route::group(['prefix' => 'supplier', 'middleware' => 'authorize:ADM,MNG,STF'], function () {
        Route::get('/', [SupplierController::class, 'index']);  // Menampilkan halaman awal supplier
        Route::post('/list', [SupplierController::class, 'list']);  // Menampilkan data supplier dalam bentuk json untuk datatables
        Route::get('/create', [SupplierController::class, 'create']);  // Menampilkan form tambah supplier
        Route::post('/', [SupplierController::class, 'store']);  // Menyimpan data supplier baru
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);  // Menampilkan form tambah supplier ajax
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);  // Menyimpan data supplier baru ajax
        Route::get('/{id}', [SupplierController::class, 'show']);  // Menampilkan detail supplier
        Route::get('/{id}/edit', [SupplierController::class, 'edit']);  // Menampilkan form edit supplier
        Route::put('/{id}', [SupplierController::class, 'update']);  // Menyimpan perubahan data supplier
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);  // Menampilkan form edit supplier ajax
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);  // Menyimpan perubahan data supplier ajax
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);  // Menampilkan form konfirmasi delete supplier ajax
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);  // Menghapus data supplier ajax
        Route::delete('/{id}', [SupplierController::class, 'destroy']);  // Menghapus data supplier
    });

    Route::group(['prefix' => 'stok', 'middleware' => 'authorize:ADM,MNG'], function () {
        Route::get('/', [StokController::class, 'index']);  // Menampilkan halaman awal Stok
        Route::post('/list', [StokController::class, 'list']);  // Menampilkan data Stok dalam bentuk json untuk datatables
        Route::get('/create', [StokController::class, 'create']);  // Menampilkan form tambah Stok
        Route::post('/', [StokController::class, 'store']);  // Menyimpan data Stok
        Route::get('/create_ajax', [StokController::class, 'create_ajax']);  // Menampilkan form tambah supplier ajax
        Route::post('/ajax', [StokController::class, 'store_ajax']);  // Menyimpan data supplier baru ajax
        Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);  // Menampilkan form edit supplier ajax
        Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);  // Menyimpan perubahan data barang ajax
        Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);  // Menampilkan form konfirmasi delete supplier ajax
        Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);  // Menghapus data supplier ajax
        Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']);  // Menampilkan detail supplier
        Route::get('/import', [StokController::class, 'import']);  // Ajax form upload excel
        Route::post('/import_ajax', [StokController::class, 'import_ajax']);  // Ajax import excel
        Route::get('/export_excel', [StokController::class, 'export_excel']);      // export excel
        Route::get('/export_pdf',[StokController::class,'export_pdf']); // export pdf

    });

    Route::group(['prefix' => 'penjualan', 'middleware' => 'authorize:ADM,MNG'], function () {
        Route::get('/', [PenjualanController::class, 'index']);  // Menampilkan halaman awal Penjualan
        Route::post('/list', [PenjualanController::class, 'list']);  // Menampilkan data Penjualan dalam bentuk json untuk datatables
        Route::get('/create', [PenjualanController::class, 'create']);  // Menampilkan form tambah Penjualan
        Route::post('/', [PenjualanController::class, 'store']);  // Menyimpan data Penjualan
        Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']);  // Menampilkan form tambah supplier ajax
        Route::post('/ajax', [PenjualanController::class, 'store_ajax']);  // Menyimpan data supplier baru ajax
        Route::get('/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']);  // Menampilkan form edit supplier ajax
        Route::put('/{id}/update_ajax', [PenjualanController::class, 'update_ajax']);  // Menyimpan perubahan data barang ajax
        Route::get('/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);  // Menampilkan form konfirmasi delete supplier ajax
        Route::delete('/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']);  // Menghapus data supplier ajax
        Route::get('/{id}/show_ajax', [PenjualanController::class, 'show_ajax']);  // Menampilkan detail supplier
        Route::get('/import', [PenjualanController::class, 'import']);  // Ajax form upload excel
        Route::post('/import_ajax', [PenjualanController::class, 'import_ajax']);  // Ajax import excel
        Route::get('/export_excel', [PenjualanController::class, 'export_excel']);      // export excel
        Route::get('/export_pdf',[PenjualanController::class,'export_pdf']); // export pdf
        Route::get('{id}/export_detail_pdf', [PenjualanController::class, 'export_detail_pdf']);

    });
    

});