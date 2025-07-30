<?php

namespace App\Livewire\Guest;

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
        return view('livewire.guest.categorie');
    }
}
