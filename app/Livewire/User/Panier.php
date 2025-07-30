<?php

namespace App\Livewire\User;

use App\Models\Categorie;
use App\Models\Point;
use App\Models\Produit;
use Livewire\Component;

class Panier extends Component
{
    public $produit;
    public $point;
    public $categorie;
    public function mount()
    {
        $this->produit = Produit::get();
        $this->point = Point::get();
        $this->categorie = Categorie::get();
    }
    public function render()
    {
        return view('livewire.user.panier');
    }
}
