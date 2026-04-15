<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $password = '';

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate([
            'password' => ['required', 'string'],
        ]);

        if (! Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $this->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <h4 class="mb-1 fw-bold">{{ __('Confirmer le mot de passe') }}</h4>
    <p class="text-muted small mb-4">{{ __('Ceci est une zone sécurisée. Veuillez confirmer votre mot de passe avant de continuer.') }}</p>

    @if (session('status'))
        <div class="alert alert-success text-center small">{{ session('status') }}</div>
    @endif

    <form wire:submit="confirmPassword">
        <div class="mb-3">
            <label for="password" class="form-label small fw-semibold">{{ __('Mot de passe') }}</label>
            <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="new-password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">{{ __('Confirmer') }}</button>
    </form>
</div>
