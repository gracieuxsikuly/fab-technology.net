<?php

namespace App\Livewire\Front;

use App\Models\Galery as ModelsGalery;
use Livewire\Component;

class Galery extends Component
{
    public function render()
    {
        $galers=ModelsGalery::all();
        return view('livewire.front.galery',compact('galers'));
    }
}
