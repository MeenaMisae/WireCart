<?php

namespace App\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;

class AdminProductIndex extends Component
{
    public bool $showProducts = true;
    public bool $showAddProductForm = false;

    public function showProductsTable(): void
    {
        $this->showProducts = true;
        $this->showAddProductForm = false;
    }

    public function addProduct(): void
    {
        $this->showAddProductForm = true;
        $this->showProducts = false;
    }

    public function render(): View
    {
        return view('livewire.admin.admin-product-index');
    }
}
