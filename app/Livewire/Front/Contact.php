<?php

namespace App\Livewire\Front;

use App\Models\Contact as ModelsContact;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Contact extends Component
{
    public $nom, $objet, $message, $email;

    protected $rules = [
        'nom' => 'required|string|max:255',
        'objet' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
        'email' => 'required|email|max:255',
    ];

    protected $messages = [
        'nom.required' => 'Le nom est requis.',
        'objet.required' => 'L\'objet est requis.',
        'message.required' => 'Le message est requis.',
        'email.required' => 'L\'email est requis.',
        'email.email' => 'Veuillez entrer un email valide.',
    ];

    public function savemessage()
    {
        $this->validate();

        ModelsContact::create([
            'nom' => $this->nom,
            'object' => $this->objet,
            'message' => $this->message,
            'email' => $this->email,
        ]);

        $this->reset();
        LivewireAlert::text('Message envoyé avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
    }

    public function render()
    {
        return view('livewire.front.contact');
    }
}
