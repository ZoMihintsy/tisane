<?php

namespace App\Livewire\Admin;

use App\Models\Categorie;
use App\Models\Produit;
use Livewire\Component;

class Gstock extends Component
{
    public $produit;
    public $categorie;
    public function mount()
    {
        $this->produit = Produit::get();
        $this->categorie = Categorie::get();
    }
    public function render()
    {
        return view('livewire.admin.gstock');
    }
}
