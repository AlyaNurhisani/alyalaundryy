<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketCucianController;

Route::get('/', [HomeController::class, 'index']);
Route::resource('outlet', OutletController::class);

Route::resource('member', MemberController::class);
Route::delete('{id}/member/delete', [MemberController::class, 'destroy']);

Route::resource('paket_cucian', PaketCucianController::class);
