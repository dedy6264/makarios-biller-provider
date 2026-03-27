<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Partner\ClientController;
use App\Http\Controllers\Partner\GroupController;
use App\Http\Controllers\Partner\MerchantController;
use App\Http\Controllers\Product\SegmentController;
use App\Http\Controllers\Product\SegmentProductController;
use App\Http\Controllers\Product\ProductTypeController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductReferenceController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProviderController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\SavingAccountController;
use App\Http\Controllers\Account\SavingTransactionController;
use App\Http\Controllers\Product\MiniAppController;


Route::middleware(['auth','checkRole:ADMT'])->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/clients/getAll', [ClientController::class, 'getAll'])->name('clients.getAll');
    Route::post('/clients/update', [ClientController::class, 'update'])->name('clients.update');
    Route::post('/clients/destroy', [ClientController::class, 'destroy'])->name('clients.destroy');

    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::post('/accounts/store', [AccountController::class, 'store'])->name('accounts.store');
    Route::post('/accounts/getAll', [AccountController::class, 'getAll'])->name('accounts.getAll');
    Route::post('/accounts/update', [AccountController::class, 'update'])->name('accounts.update');
    Route::post('/accounts/destroy', [AccountController::class, 'destroy'])->name('accounts.destroy');
    
    Route::get('/savings', [SavingAccountController::class, 'index'])->name('savings.index');
    Route::post('/savings/store', [SavingAccountController::class, 'store'])->name('savings.store');
    Route::post('/savings/getAll', [SavingAccountController::class, 'getAll'])->name('savings.getAll');
    Route::post('/savings/update', [SavingAccountController::class, 'update'])->name('savings.update');
    Route::post('/savings/destroy', [SavingAccountController::class, 'destroy'])->name('savings.destroy');
    Route::post('/savings/destroy', [SavingAccountController::class, 'destroy'])->name('savings.destroy');
    
    Route::get('/saving_transactions', [SavingTransactionController::class, 'index'])->name('saving_transactions.index');
    Route::post('/saving_transactions/getAll', [SavingTransactionController::class, 'getAll'])->name('saving_transactions.getAll');
});
Route::middleware(['auth','checkRole:ADMT,CLT'])->group(function () {
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::post('/groups/store', [GroupController::class, 'store'])->name('groups.store');
    Route::post('/groups/getAll', [GroupController::class, 'getAll'])->name('groups.getAll');
    Route::post('/groups/update', [GroupController::class, 'update'])->name('groups.update');
    Route::post('/groups/destroy', [GroupController::class, 'destroy'])->name('groups.destroy');
    
    Route::get('/merchants', [MerchantController::class, 'index'])->name('merchants.index');
    Route::post('/merchants/store', [MerchantController::class, 'store'])->name('merchants.store');
    Route::post('/merchants/getAll', [MerchantController::class, 'getAll'])->name('merchants.getAll');
    Route::post('/merchants/update', [MerchantController::class, 'update'])->name('merchants.update');
    Route::post('/merchants/destroy', [MerchantController::class, 'destroy'])->name('merchants.destroy');

    
});