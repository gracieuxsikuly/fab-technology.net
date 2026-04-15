<?php

namespace App\Livewire\Front;

use App\Models\Mission;
use App\Models\Projet;
use App\Models\Vision;
use Livewire\Component;

class VisionmissionprojetDetail extends Component
{
    public $type, $id;

    public function render()
    {
        switch ($this->type) {
            case 'vision':
                $data = Vision::findOrFail($this->id);
                $imageFolder = 'vision';
                break;
            case 'mission':
                $data = Mission::findOrFail($this->id);
                $imageFolder = 'mission';
                break;
            case 'projet':
                $data = Projet::findOrFail($this->id);
                $imageFolder = 'projet';
                break;
            default:
                abort(404);
        }
        return view('livewire.front.visionmissionprojet-detail', compact('data', 'imageFolder'));
    }
}
