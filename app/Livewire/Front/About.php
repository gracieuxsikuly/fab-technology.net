<?php

namespace App\Livewire\Front;

use App\Models\About as ModelsAbout;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        $abouts=ModelsAbout::all();
        return view('livewire.front.about',compact('abouts'));
    }
}
