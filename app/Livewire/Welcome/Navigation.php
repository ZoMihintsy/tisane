<?php

namespace App\Livewire\Welcome;

use App\Models\Categorie;
use Livewire\Component;

class Navigation extends Component
{
    public $categorie;
    public function mount()
    {
        $this->categorie = Categorie::get();
    }
    public function render()
    {
        return view('livewire.welcome.navigation');
    }
}
