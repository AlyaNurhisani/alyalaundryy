<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketCucianController;
use App\Http\Controllers\LoginController;

Route::resource('outlet', OutletController::class)->middleware('auth');
Route::get('/home', [HomeController::class, 'index']);


Route::resource('member', MemberController::class);
Route::delete('{id}/member/delete', [MemberController::class, 'destroy']);

Route::resource('paket_cucian', PaketCucianController::class);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' =>'a','middleware' =>['isAdmin','auth']],function(){  
   Route::get('home',[Homecontroller::class, 'index'])->name('a.home');
   Route::resource('member', MemberController::class);
   Route::resource('paket', PaketController::class);
   Route::resource('outlet', OutletController::class);
   Route::get('transaksi',[TransaksiController::class, 'index']);
   Route::get('laporan',[LaporanController::class, 'index']);

});

Route::group(['prefix' =>'k','middleware' =>['isKasir','auth']],function(){  
    Route::get('home',[Homecontroller::class, 'index'])->name('k.home');
    Route::resource('member', MemberController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('outlet', OutletController::class);
    Route::get('transaksi',[TransaksiController::class, 'index']);
    Route::get('laporan',[LaporanController::class, 'index']);
});

Route::group(['prefix' =>'o','middleware' =>['isOwner','auth']],function(){  
    Route::get('home',[Homecontroller::class, 'index'])->name('o.home');
    Route::get('laporan',[LaporanController::class, 'index']);
});