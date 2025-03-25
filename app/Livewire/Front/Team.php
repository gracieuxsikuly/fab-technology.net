<?php

namespace App\Livewire\Front;

use App\Models\Equipe;
use Livewire\Component;

class Team extends Component
{
    public function render()
    {
        $equipes=Equipe::all();
        return view('livewire.front.team',compact('equipes'));
    }
}
