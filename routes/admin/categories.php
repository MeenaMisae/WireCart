<?php

use App\Http\Controllers\Admin\AdminCategoriesController;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(static function () {
    Route::get('', [AdminCategoriesController::class, 'index'])->name('admin.categories.index');
});
