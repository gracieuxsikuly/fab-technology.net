<?php

namespace App\Livewire\Front;

use App\Models\Service as ModelsService;
use Livewire\Component;

class Service extends Component
{
    public function render()
    {
        $servs=ModelsService::all();
        return view('livewire.front.service',compact('servs'));
    }
}
