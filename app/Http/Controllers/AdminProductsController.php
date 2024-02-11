<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductsController extends Controller
{
    public function index(): View
    {
        return view ('admin.products.index');
    }
}
