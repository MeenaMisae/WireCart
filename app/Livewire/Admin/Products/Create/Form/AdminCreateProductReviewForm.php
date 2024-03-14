<?php

namespace App\Livewire\Admin\Products\Create\Form;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\Attributes\On;


class AdminCreateProductReviewForm extends Component
{
    public $productDiscount;
    public bool $onSale;
    public $productFinalPrice;
    public $productPrice;
    public $productQuantity;
    public $productName;
    public $productDescription;
    public $category;
    public $subcategory;
    public array $data;

    #[On('create_product_form')]
    public function receiveData($arr)
    {
        $this->data = $arr;
        $this->productDescription = $this->data['description'];
        $this->onSale = $this->data['on_sale'];
        if ($this->onSale === true) :
            $this->productFinalPrice =  $this->data['final_price'];
            $this->productDiscount = $this->data['discount'];
        endif;
        $this->productPrice = $this->data['original_price'];
        $this->category =  Category::find($this->data['category_id'])->name;
        $this->subcategory =  Subcategory::find($this->data['category_id'])->name;
        $this->productName =  $this->data['name'];
        $this->productQuantity =  $this->data['quantity'];
        // $this->data['on_sale'] ? $this->productDiscount = $this->data['discount'] : '';
    }

    public function render()
    {
        return view('livewire.admin.products.create.form.admin-create-product-review-form');
    }
}
