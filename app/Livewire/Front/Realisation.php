<?php

namespace App\Livewire\Front;

use App\Models\Realisationcount;
use Livewire\Component;

class Realisation extends Component
{
    public function render()
    {
        $reals=Realisationcount::all();
        return view('livewire.front.realisation',compact('reals'));
    }
}
