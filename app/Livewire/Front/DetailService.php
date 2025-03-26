<?php

namespace App\Livewire\Front;

use App\Models\Service;
use Livewire\Component;

class DetailService extends Component
{
    public $slug;
    public function render()
    {
        $serdets=Service::where('slug', $this->slug)->get();
        if (!$serdets) {
            abort(404);
        }
        return view('livewire.front.detail-service', compact('serdets'));
    }
}
