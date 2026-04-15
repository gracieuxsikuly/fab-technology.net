<?php

namespace App\Livewire\Backend;

use App\Models\About;
use App\Models\Contact;
use App\Models\Equipe;
use App\Models\Faq;
use App\Models\Galery;
use App\Models\Mission;
use App\Models\Projet;
use App\Models\Service;
use App\Models\User;
use App\Models\Vision;
use Livewire\Component;

class DashboardLivewire extends Component
{
    public function render()
    {
        return view('livewire.backend.dashboard-livewire', [
            'usersCount' => User::count(),
            'servicesCount' => Service::count(),
            'projetsCount' => Projet::count(),
            'messagesCount' => Contact::count(),
            'aboutsCount' => About::count(),
            'missionsCount' => Mission::count(),
            'visionsCount' => Vision::count(),
            'equipesCount' => Equipe::count(),
            'galeriesCount' => Galery::count(),
            'faqsCount' => Faq::count(),
            'recentMessages' => Contact::orderBy('created_at', 'desc')->take(5)->get(),
        ]);
    }
}
