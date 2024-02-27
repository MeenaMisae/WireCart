<?php

namespace App\Livewire\Admin\Products\Create\Form;

use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCreateProductImageForm extends Component
{
    use WithFileUploads;
    public $files = [];

    public function render()
    {
        return view('livewire.admin.products.create.form.admin-create-product-image-form');
    }
}
