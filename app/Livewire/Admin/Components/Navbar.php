<?php

namespace App\Livewire\Admin\Components;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public bool $visibleNavbar = true;

    #[On('hide_navbar')]
    public function hideNavbar(): void
    {
        $this->visibleNavbar = false;
    }

    #[On('show_navbar')]
    public function showNavbar(): void
    {
        $this->visibleNavbar = true;
    }

    public function render(): View
    {
        return view('livewire.admin.components.navbar');
    }
}
