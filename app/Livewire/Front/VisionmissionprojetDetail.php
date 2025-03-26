<?php

namespace App\Livewire\Front;

use App\Models\Mission;
use App\Models\Projet;
use App\Models\Vision;
use Livewire\Component;

class VisionmissionprojetDetail extends Component
{
    public $designation,$id;
    public function render()
    {
       switch ($this->designation) {
            case 'Notre Vision':
                $datas = Vision::where('id',$this->id)->get();
                break;
            case 'Notre Mission':
                $datas = Mission::where('id',$this->id)->get();
                break;
            case 'Nos Projets':
                $datas = Projet::where('id',$this->id)->get();
                break;
            default:
                $datas = null;
        }
        return view('livewire.front.visionmissionprojet-detail',compact('datas'));
    }
}
