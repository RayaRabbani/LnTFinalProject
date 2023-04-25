<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminInvoiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frondend\HomeController;

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

// Route::get('tes', function () {
//     return view('.invoice');
// });
Route::get('/', HomeController::class);

Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login.create');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
Route::middleware('auth')->group(function(){
    Route::get('dashboard', DashboardController::class)->name('dashboard');


    Route::get('keranjang', [CartController::class, 'keranjang'])->name('keranjang');
    Route::get('keranjang/proses/{id}', [InvoiceController::class, 'proses_keranjang'])->name('keranjang.proses');
    Route::post('add/cart', [CartController::class, 'add_cart'])->name('add.cart');
    Route::post('invoice', [InvoiceController::class, 'invoice'])->name('invoice.store');
    
    Route::get('faktur', [InvoiceController::class, 'getInvoiceByUSer'])->name('getInvoiceByUSer');
    Route::get('faktur/cetak/{id}', [InvoiceController::class, 'cetakInvoice'])->name('cetakInvoice');

  
   
    
    Route::prefix('master-data')->middleware('is_admin')->group(function(){
        Route::resource('kategori', KategoriController::class)->names([
            'index'   => 'admin.kategori.index',
            'create'  => 'admin.kategori.create',
            'store'   => 'admin.kategori.store',
            'show'    => 'admin.kategori.show',
            'edit'    => 'admin.kategori.edit',
            'update'  => 'admin.kategori.update',
            'destroy' => 'admin.kategori.destroy',
        ])->except('show');

        Route::resource('barang', BarangController::class)->names([
            'index'   => 'admin.barang.index',
            'create'  => 'admin.barang.create',
            'store'   => 'admin.barang.store',
            'show'    => 'admin.barang.show',
            'edit'    => 'admin.barang.edit',
            'update'  => 'admin.barang.update',
            'destroy' => 'admin.barang.destroy',
        ])->except('show');

    });
    Route::get('admin/invoice', AdminInvoiceController::class)->name('admin.incoive')->middleware('is_admin');

    
    // logout
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
