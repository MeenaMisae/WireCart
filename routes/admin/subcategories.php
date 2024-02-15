<?php

use App\Http\Controllers\Admin\AdminSubcategoriesController;
use Illuminate\Support\Facades\Route;

Route::prefix('subcategories')->group(static function () {
    Route::get('', [AdminSubcategoriesController::class, 'index'])->name('admin.subcategories.index');
});
