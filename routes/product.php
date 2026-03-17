<?php
use App\Http\Controllers\Product\SegmentController;
use App\Http\Controllers\Product\ProductSegmentController;
use App\Http\Controllers\Product\ProductTypeController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductReferenceController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProviderController;
use App\Http\Controllers\Product\ProductProviderController;
use App\Http\Controllers\Product\TransactionController;


Route::middleware(['auth','checkRole:ADMT'])->group(function () {
    Route::get('/segments', [SegmentController::class, 'index'])->name('segments.index');
    Route::post('/segments/store', [SegmentController::class, 'store'])->name('segments.store');
    Route::post('/segments/getAll', [SegmentController::class, 'getAll'])->name('segments.getAll');
    Route::post('/segments/update', [SegmentController::class, 'update'])->name('segments.update');
    Route::post('/segments/destroy', [SegmentController::class, 'destroy'])->name('segments.destroy');
   
    Route::get('/product_segments', [ProductSegmentController::class, 'index'])->name('product_segments.index');
    Route::post('/product_segments/store', [ProductSegmentController::class, 'store'])->name('product_segments.store');
    Route::post('/product_segments/getAll', [ProductSegmentController::class, 'getAll'])->name('product_segments.getAll');
    Route::post('/product_segments/update', [ProductSegmentController::class, 'update'])->name('product_segments.update');
    Route::post('/product_segments/destroy', [ProductSegmentController::class, 'destroy'])->name('product_segments.destroy');
     
    Route::get('/providers', [ProviderController::class, 'index'])->name('providers.index');
    Route::post('/providers/store', [ProviderController::class, 'store'])->name('providers.store');
    Route::post('/providers/getAll', [ProviderController::class, 'getAll'])->name('providers.getAll');
    Route::post('/providers/update', [ProviderController::class, 'update'])->name('providers.update');
    Route::post('/providers/destroy', [ProviderController::class, 'destroy'])->name('providers.destroy');
   
    Route::get('/product_providers', [ProductProviderController::class, 'index'])->name('product_providers.index');
    Route::post('/product_providers/store', [ProductProviderController::class, 'store'])->name('product_providers.store');
    Route::post('/product_providers/getAll', [ProductProviderController::class, 'getAll'])->name('product_providers.getAll');
    Route::post('/product_providers/update', [ProductProviderController::class, 'update'])->name('product_providers.update');
    Route::post('/product_providers/destroy', [ProductProviderController::class, 'destroy'])->name('product_providers.destroy');
   
});
Route::middleware(['auth','checkRole:ADMT,CLT'])->group(function () {
    Route::get('/product_types', [ProductTypeController::class, 'index'])->name('product_types.index');
    Route::post('/product_types/store', [ProductTypeController::class, 'store'])->name('product_types.store');
    Route::post('/product_types/getAll', [ProductTypeController::class, 'getAll'])->name('product_types.getAll');
    Route::post('/product_types/update', [ProductTypeController::class, 'update'])->name('product_types.update');
    Route::post('/product_types/destroy', [ProductTypeController::class, 'destroy'])->name('product_types.destroy');
   
    Route::get('/product_categories', [ProductCategoryController::class, 'index'])->name('product_categories.index');
    Route::post('/product_categories/store', [ProductCategoryController::class, 'store'])->name('product_categories.store');
    Route::post('/product_categories/getAll', [ProductCategoryController::class, 'getAll'])->name('product_categories.getAll');
    Route::post('/product_categories/update', [ProductCategoryController::class, 'update'])->name('product_categories.update');
    Route::post('/product_categories/destroy', [ProductCategoryController::class, 'destroy'])->name('product_categories.destroy');
    
    Route::get('/product_references', [ProductReferenceController::class, 'index'])->name('product_references.index');
    Route::post('/product_references/store', [ProductReferenceController::class, 'store'])->name('product_references.store');
    Route::post('/product_references/getAll', [ProductReferenceController::class, 'getAll'])->name('product_references.getAll');
    Route::post('/product_references/update', [ProductReferenceController::class, 'update'])->name('product_references.update');
    Route::post('/product_references/destroy', [ProductReferenceController::class, 'destroy'])->name('product_references.destroy');
   
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::post('/products/getAll', [ProductController::class, 'getAll'])->name('products.getAll');
    Route::post('/products/update', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transactions/getAll', [TransactionController::class, 'getAll'])->name('transactions.getAll');
   
});