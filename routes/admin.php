<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(static function () {
    Route::get('', [AdminController::class, 'index']);
    require __DIR__ . '/admin/products.php';
});
