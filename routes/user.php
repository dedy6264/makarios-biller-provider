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
use App\Http\Controllers\Product\MiniAppController;

Route::middleware(['auth','checkRole:ADMT'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/users/getAll', [UserController::class, 'getAll'])->name('users.getAll');
        Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
        Route::post('/users/destroy', [UserController::class, 'destroy'])->name('users.destroy');
        
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::post('/roles/getAll', [RoleController::class, 'getAll'])->name('roles.getAll');
        Route::post('/roles/update', [RoleController::class, 'update'])->name('roles.update');
        Route::post('/roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::get('/user_roles', [UserRoleController::class, 'index'])->name('user_roles.index');
        Route::post('/user_roles/store', [UserRoleController::class, 'store'])->name('user_roles.store');
        Route::post('/user_roles/getAll', [UserRoleController::class, 'getAll'])->name('user_roles.getAll');
        Route::post('/user_roles/update', [UserRoleController::class, 'update'])->name('user_roles.update');
        Route::post('/user_roles/destroy', [UserRoleController::class, 'destroy'])->name('user_roles.destroy');

});
