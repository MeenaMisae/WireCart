<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Subcategory;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\On;

class AdminSubcategoriesIndex extends Component
{
    public bool $showSubcategories = true;
    public bool $showAddSubcategoryForm = false;
    public $subcategories;

    public function mount(): void
    {
        $this->subcategories = Subcategory::all();
    }

    public function showSubcategoriesTable(): void
    {
        $this->showSubcategories = true;
        $this->showAddSubcategoryForm = false;
    }

    public function addSubcategory(): void
    {
        $this->showSubcategories = false;
        $this->showAddSubcategoryForm = true;
    }

    #[On('new_subcategory_created')]
    public function showNewSubcategory(): void
    {
        $this->showAddSubcategoryForm = false;
        $this->showSubcategories = true;
        $this->mount();
        $this->render();
    }

    public function render(): View
    {
        return view('livewire.admin.subcategories.admin-subcategories-index');
    }
}
