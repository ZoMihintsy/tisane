<?php

namespace App\Livewire\Admin;

use App\Models\Point as ModelsPoint;
use Livewire\Component;

class Point extends Component
{
    public $point;
    public string $nom = "";
    public string $ville = "";
    public string $code_postale = "";
    public function mount()
    {
        $this->point = ModelsPoint::get();
    }
    public function savePoint()
    {
        $this->validate([
            'nom'=>'required',
            'ville'=>'required',
            'code_postale'=>'required'
        ]);
        ModelsPoint::create([
            'nom'=>$this->nom,
            'ville'=>$this->ville,
            'code_postale'=>$this->code_postale
        ]);
        $this->redirect('/admin/marketing+emplacement',navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.point');
    }
}
