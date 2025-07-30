<?php

namespace App\Livewire\Admin;

use App\Models\Categorie;
use App\Models\Produit as ModelsProduit;
use Livewire\Component;
use Livewire\WithFileUploads;

class Produit extends Component
{
    use WithFileUploads;
    public $categorie;
    public $produit;
    public string $nom = "";
    public string $categorie_id = "";
    public string $prix = "";
    public string $stock = "";
    public string $description1 = "";
    public string $description2 = "";
    public  $photo;
    public function mount()
    {
        $this->categorie = Categorie::get();
        $this->produit = ModelsProduit::get();
    }
    public function saveProduct()
    {
        $this->validate([
            'nom'=>'required',
            'categorie_id'=>'required',
            'prix'=>'required',
            'stock'=>'required',
            'description1'=>'required',
            'photo'=>['required','image']
        ]);
        $this->photo->store('public');
        $photo = $this->photo->store();
        
        ModelsProduit::create([
            'nom'=> $this->nom,
            'categorie_id'=> $this->categorie_id,
            'prix'=> $this->prix,
            'stock'=> $this->stock,
            'description1'=> nl2br($this->description1),
            'description2'=> nl2br($this->description2),
            'photo'=>$photo,
        ]);
        $this->redirect('/admin/produits',navigate:true);
     
         
    }
    public function render()
    {
        return view('livewire.admin.produit');
    }
}
