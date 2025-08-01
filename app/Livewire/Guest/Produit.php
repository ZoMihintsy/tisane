<?php

namespace App\Livewire\Guest;

use App\Models\Categorie;
use App\Models\Point;
use App\Models\Produit as ModelsProduit;
use Livewire\Component;

class Produit extends Component
{
    public $produit;
    public $cats;
    public $categorie;
    public $point;
    public function mount()
    {
        $this->produit = ModelsProduit::orderBy('updated_at','desc')->get();
        $this->categorie = Categorie::get();
        $this->point = Point::get();
    }
    public function list()
    {
        if (empty($this->cats)) {
        $this->produit = ModelsProduit::orderBy('updated_at','desc')->get();
           
        }else{
            $this->produit = ModelsProduit::orderBy('updated_at','desc')->where('categorie_id',$this->cats)->get();

        }
    }
    public function render()
    {
        return view('livewire.guest.produit');
    }
}
