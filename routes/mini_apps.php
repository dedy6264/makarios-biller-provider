<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\MiniAppController;


Route::middleware(['auth','checkRole:ADMT,OTL'])->group(function () {
    Route::get('/mini_apps', [MiniAppController::class, 'index'])->name('mini_apps.index');
    Route::post('/mini_apps/store', [MiniAppController::class, 'store'])->name('mini_apps.store');
    Route::post('/mini_apps/getAll', [MiniAppController::class, 'getAll'])->name('mini_apps.getAll');
    Route::post('/mini_apps/update', [MiniAppController::class, 'update'])->name('mini_apps.update');
    Route::post('/mini_apps/destroy', [MiniAppController::class, 'destroy'])->name('mini_apps.destroy');
    Route::post('/mini_apps/inquiry', [MiniAppController::class, 'inquiry'])->name('mini_apps.inquiry');
    Route::post('/mini_apps/payment', [MiniAppController::class, 'payment'])->name('mini_apps.payment');
    Route::post('/mini_apps/advice', [MiniAppController::class, 'advice'])->name('mini_apps.advice');
    Route::post('/mini_apps/get_product_by_cust_id', [MiniAppController::class, 'get_product_by_cust_id'])->name('mini_apps.get_product_by_cust_id');
    Route::post('/mini_apps/get_balance', [MiniAppController::class, 'get_balance'])->name('mini_apps.get_balance');
});
