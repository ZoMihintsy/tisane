<?php

namespace App\Livewire\Guest;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;

class Blog extends Component
{
    public string $nom = "";
    public string $email = "";
    public string $commentaire = "";
    public $blog;
    public function mount()
    {
        $this->blog = ModelsBlog::orderBy('created_at','desc')->get();
    }
    public function saveComs()
    {
        $this->validate([
            'nom'=>'required',
            'email'=>'required|email',
            'commentaire'=>'required'
        ]);
        ModelsBlog::create([
            'nom'=>$this->nom,
            'email'=>$this->email,
            'commentaire'=>nl2br($this->commentaire)
        ]);
      $this->redirect("/blog");
    }
    public function render()
    {
        return view('livewire.guest.blog');
    }
}
