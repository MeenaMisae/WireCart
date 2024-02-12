<?php

namespace App\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;

class AdminCreateProduct extends Component
{
    public int $productDiscount = 0;
    public bool $onSale = false;
    public $productFinalPrice;
    public $productPrice;

    public function calculateDiscount(): void
    {
        if (empty($this->productPrice)):
            return;
        endif;
        $this->productFinalPrice = $this->productPrice - $this->productPrice * ($this->productDiscount / 100);
    }

    public function render(): View
    {
        return view('livewire.admin.admin-create-product');
    }
}
