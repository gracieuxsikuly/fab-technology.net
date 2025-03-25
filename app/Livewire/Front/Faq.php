<?php

namespace App\Livewire\Front;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        $faqs=ModelsFaq::all();
        return view('livewire.front.faq',compact('faqs'));
    }
}
