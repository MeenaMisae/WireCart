<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use Illuminate\View\View;

class AdminCreateSubcategory extends Component
{
    #[Validate('required|min:3|unique:subcategories,name', as: 'subcategoria')]
    public string $subcategoryName;
    #[Validate('required|exists:categories,id', as: 'categoria')]
    public $categoryID = 0;
    public $categories;

    public function mount(): void
    {
        $this->categories = Category::all();
    }

    public function createSubcategory(): void
    {
        $this->validate();
        $slug = Str::slug($this->subcategoryName);
        Subcategory::create([
            'category_id' => $this->categoryID,
            'name' => $this->subcategoryName,
            'slug' => $slug,
        ]);
        $this->dispatch('new_subcategory_created')->to(AdminSubcategoriesIndex::class);
    }

    public function render(): View
    {
        return view('livewire.admin.subcategories.admin-create-subcategory');
    }
}
