<?php

use App\Http\Controllers\Admin\AdminProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(static function () {
    Route::get('', [AdminProductsController::class, 'index'])->name('admin.products.index');
});
