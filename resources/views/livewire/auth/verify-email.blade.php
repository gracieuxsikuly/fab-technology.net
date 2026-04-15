<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div>
    <h4 class="mb-1 fw-bold">{{ __('Vérification email') }}</h4>
    <p class="text-muted small mb-3">{{ __('Veuillez vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer.') }}</p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success small">{{ __('Un nouveau lien de vérification a été envoyé à votre adresse email.') }}</div>
    @endif

    <div class="d-grid gap-2">
        <button wire:click="sendVerification" class="btn btn-primary">{{ __('Renvoyer le lien de vérification') }}</button>
        <button wire:click="logout" class="btn btn-link text-muted small">{{ __('Déconnexion') }}</button>
    </div>
</div>
