<?php

namespace App\Livewire\User;

use App\Models\Categorie as ModelsCategorie;
use Livewire\Component;

class Categorie extends Component
{
    public $categorie;
    public function mount()
    {
        $this->categorie = ModelsCategorie::get();
    }
    public function render()
    {
        return view('livewire.user.categorie');
    }
}
