<?php

namespace App\Livewire\User;

use App\Models\Categorie;
use App\Models\Point;
use App\Models\Produit as ModelsProduit;
use Livewire\Component;

class Produit extends Component
{
    public $produit;
    public $categorie;
    public $point;
    public function mount()
    {
        $this->produit = ModelsProduit::orderBy('updated_at','desc')->get();
        $this->categorie = Categorie::get();
        $this->point = Point::get();
    }
    public function render()
    {
        return view('livewire.user.produit');
    }
}
