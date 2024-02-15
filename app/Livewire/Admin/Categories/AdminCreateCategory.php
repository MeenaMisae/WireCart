<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\View\View;

class AdminCreateCategory extends Component
{
    #[Validate('required|min:3|unique:categories,name', as: 'categoria')]
    public string $categoryName;

    public function createCategory(): void
    {
        $this->validate();
        $slug = Str::slug($this->categoryName);
        Category::create([
            'name' => $this->categoryName,
            'slug' => $slug,
        ]);
        $this->dispatch('new_category_created')->to(AdminCategoriesIndex::class);
    }

    public function render(): View
    {
        return view('livewire.admin.categories.admin-create-category');
    }
}
