<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div>
    <h4 class="mb-1 fw-bold">{{ __('Mot de passe oublié') }}</h4>
    <p class="text-muted small mb-4">{{ __('Entrez votre email pour recevoir un lien de réinitialisation') }}</p>

    @if (session('status'))
        <div class="alert alert-success text-center small">{{ session('status') }}</div>
    @endif

    <form wire:submit="sendPasswordResetLink">
        <div class="mb-3">
            <label for="email" class="form-label small fw-semibold">{{ __('Adresse email') }}</label>
            <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@example.com" required autofocus>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <span wire:loading.remove>{{ __('Envoyer le lien de réinitialisation') }}</span>
            <span wire:loading><span class="spinner-border spinner-border-sm me-1"></span>{{ __('Envoi...') }}</span>
        </button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="small text-decoration-none">{{ __('Retour à la connexion') }}</a>
    </div>
</div>
