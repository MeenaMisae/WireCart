<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCreateProduct extends Component
{
    use WithFileUploads;
    public int $productDiscount = 0;
    public bool $onSale = false;
    #[Validate('required|image', as: 'imagem do produto')]
    public $productImage;
    public $productFinalPrice;
    #[Validate('required|numeric', as: 'preço')]
    public $productPrice;
    #[Validate('required|integer', as: 'quantidade')]
    public $productQuantity;
    #[Validate('required|string|min:3', as: 'produto')]
    public $productName;
    #[Validate('nullable|string|min:3|max:200', as: 'descrição')]
    public $productDescription;
    #[Validate('required|exists:categories,id', as: 'categoria')]
    public $categoryID = 0;
    #[Validate('required|exists:subcategories,id', as: 'subcategoria')]
    public $subcategoryID = 0;
    public Collection $categories;
    public $subcategories;

    public function messages(): array
    {
        return [
            'subcategoryID.exists' => 'subcategoria inválida.',
            'categoryID.exists' => 'categoria inválida.'
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
        if ($this->productFinalPrice):
            Product::create([
                'category_id' => $this->categoryID,
                'subcategory_id' => $this->subcategoryID,
                'price' => $this->productFinalPrice,
                'name' => $this->productName,
                'description' => $this->productDescription,
                'slug' => Str::slug($this->productName),
                'quantitiy' => '',

                'on_sale' => true,
                'discount' => $this->productDiscount / 100
            ]);
            $this->reset('productName', 'productDescription', 'categoryID', 'subcategoryID', 'productPrice', 'onSale');
        endif;
    }

    public function render(): View
    {
        return view('livewire.admin.admin-create-product', [
            'categories' => $this->categories,
        ]);
    }
}
