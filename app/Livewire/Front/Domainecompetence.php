<?php

namespace App\Livewire\Front;

use App\Models\Domainecompetence as ModelDomainecompetence;
use Livewire\Component;

class Domainecompetence extends Component
{
    public function render()
    {
        $domainecompetences = ModelDomainecompetence::all();
        return view('livewire.front.domainecompetence', compact('domainecompetences'));
    }
}
