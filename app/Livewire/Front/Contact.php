<?php

namespace App\Livewire\Front;

use App\Models\Contact as ModelsContact;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Contact extends Component
{
    public $nom,$objet,$message,$email;
    public function savemessage(){
        $save=ModelsContact::create([
            'nom' => $this->nom,
            'object' => $this->objet,
            'message' => $this->message,
            'email' => $this->email,
        ]);
        if($save){
            $this->reset();
        LivewireAlert::text('Message Envoyé avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.front.contact');
    }
}
