<?php

namespace App\Livewire\Admin\Products;

use App\Livewire\Admin\Components\Navbar;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class AdminProductIndex extends Component
{
    public bool $showProducts = true;
    public bool $showAddProductForm = false;
    public $productTable;
    public Collection $products;

    public function mount(): void
    {
        $this->products = Product::all();
    }

    public function showProductsTable(): void
    {
        $this->showProducts = true;
        $this->showAddProductForm = false;
        $this->dispatch('show_navbar')->to(Navbar::class);
    }

    public function addProduct(): void
    {
        $this->showAddProductForm = true;
        $this->showProducts = false;
        $this->dispatch('hide_navbar')->to(Navbar::class);
    }

    public function render(): View
    {
        return view('livewire.admin.products.admin-product-index', [
            'products' => $this->products,
        ]);
    }
}
