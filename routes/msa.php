<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Msa\MsaController;
Route::get('/msa', [MsaController::class, 'index'])->name('msa.index');
Route::get('/msa/sign-up', [MsaController::class, 'signUp'])->name('msa.signUp');
Route::post('/msa/sign-up', [MsaController::class, 'signUp'])->name('msa.signUp.post');
Route::get('/msa/sign-in', [MsaController::class, 'signIn'])->name('msa.signIn');
Route::post('/msa/sign-in', [MsaController::class, 'signIn'])->name('msa.signIn.post');
Route::get('/msa/home', [MsaController::class, 'home'])->name('msa.home');
Route::get('/msa/get-balance', [MsaController::class, 'getBalance'])->name('msa.getBalance');
Route::post('/msa/get-transactions', [MsaController::class, 'getTransactions'])->name('msa.getTransactions');
Route::post('/msa/get-product-by-type', [MsaController::class, 'getProductByType'])->name('msa.getProductByType');
Route::get('/msa/get-profile', [MsaController::class, 'getProfile'])->name('msa.getProfile');
Route::post('/msa/get-product-prefix', [MsaController::class, 'getProductPrefix'])->name('msa.getProductPrefix');
Route::post('/msa/inquiry', [MsaController::class, 'inquiry'])->name('msa.inquiry');
Route::post('/msa/payment', [MsaController::class, 'payment'])->name('msa.payment');
Route::post('/msa/set-pin', [MsaController::class, 'setPin'])->name('msa.setPin');
Route::get('/loading', function(){
    return view('contents.msa.xxx');
});