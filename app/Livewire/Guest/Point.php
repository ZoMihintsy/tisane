<?php

namespace App\Livewire\Guest;

use App\Models\Point as ModelsPoint;
use Livewire\Component;

class Point extends Component
{
    public $point;
    public function mount()
    {
        $this->point = ModelsPoint::get();
    }
    public function render()
    {
        return view('livewire.guest.point');
    }
}
