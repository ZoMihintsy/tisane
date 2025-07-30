<?php

namespace App\Livewire\Admin;

use App\Models\Categorie as ModelsCategorie;
use Livewire\Component;

class Categorie extends Component
{
    public string $nom = "";
    public string $description = "";
    public $categorie;
    public function mount()
    {
        $this->categorie = ModelsCategorie::get();
    }
    public function saveCategory()
    {
        $this->validate([
            'nom'=>'required'
        ]);
        ModelsCategorie::create([
            'nom'=>$this->nom,
            'description'=>nl2br($this->description)
        ]);
        $this->redirect('/admin/catégories',navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.categorie');
    }
}
