<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminProductIndex extends Component
{
    public Collection $products;

    public function mount(): void
    {
        $this->products = Product::all();
    }

    public function render(): View
    {
        return view('livewire.admin.products.admin-product-index', [
            'products' => $this->products,
        ]);
    }
}
