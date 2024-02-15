<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(static function () {
    Route::get('', [AdminController::class, 'index'])->name('admin.index');
    require __DIR__ . '/admin/products.php';
    require __DIR__ . '/admin/categories.php';
    require __DIR__ . '/admin/subcategories.php';
});
