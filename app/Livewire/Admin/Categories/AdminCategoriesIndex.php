<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminCategoriesIndex extends Component
{
    public bool $showCategories = true;
    public bool $showAddCategoryForm = false;
    public $categories;

    public function mount(): void
    {
        $this->categories = Category::all();
    }

    public function showCategoriesTable(): void
    {
        $this->showCategories = true;
        $this->showAddCategoryForm = false;
    }

    public function addCategory(): void
    {
        $this->showCategories = false;
        $this->showAddCategoryForm = true;
    }

    #[On('new_category_created')]
    public function showNewCategory(): void
    {
        $this->showAddCategoryForm = false;
        $this->showCategories = true;
        $this->mount();
        $this->render();
    }

    public function render(): View
    {
        return view('livewire.admin.categories.admin-categories-index');
    }
}
