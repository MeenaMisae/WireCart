<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminCreateProduct extends Component
{
    public int $productDiscount = 0;
    public bool $onSale = false;
    public $productFinalPrice;
    public $productPrice;
    #[Validate('required|string|min:3', as: 'produto')]
    public $productName;
    #[Validate('required|exists:categories,id', as: 'categoria')]
    public $categoryID = 0;
    #[Validate('required|exists:subcategories,id', as: 'subcategoria')]
    public $subcategoryID = 0;
    public Collection $categories;
    public $subcategories;

    public function messages(): array
    {
        return [
            'subcategoryID.exists' => 'subcategoria inválida',
        ];
    }
    public function mount(): void
    {
        $this->categories = Category::all();
    }

    public function calculateDiscount(): void
    {
        if (empty($this->productPrice)):
            return;
        endif;
        $this->productFinalPrice = $this->productPrice - $this->productPrice * ($this->productDiscount / 100);
    }

    public function loadSubcategories(): void
    {
        $this->subcategories = Subcategory::where('category_id', '=', $this->categoryID)->get();
    }

    public function createProduct(): void
    {
        $this->validate();
    }

    public function render(): View
    {
        return view('livewire.admin.admin-create-product', [
            'categories' => $this->categories,
        ]);
    }
}
