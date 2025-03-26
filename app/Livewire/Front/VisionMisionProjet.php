<?php

namespace App\Livewire\Front;

use App\Models\Mission;
use App\Models\Projet;
use App\Models\Vision;
use Livewire\Component;

class VisionMisionProjet extends Component
{
    public function render()
    {
        $visons=Vision::all();
        $missions=Mission::all();
        $projets=Projet::all();
        return view('livewire.front.vision-mision-projet',compact('visons','missions','projets'));
    }
}
