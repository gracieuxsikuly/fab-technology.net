<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div>
    <h4 class="mb-1 fw-bold">{{ __('Authentification') }}</h4>
    <p class="text-muted small mb-4">{{ __('Entrez votre email et votre mot de passe ci-dessous pour vous connecter') }}</p>

    @if (session('status'))
        <div class="alert alert-success text-center small">{{ session('status') }}</div>
    @endif

    <form wire:submit="login">
        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label small fw-semibold">{{ __('Adresse email') }}</label>
            <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@example.com" required autofocus autocomplete="email">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="form-label small fw-semibold">{{ __('Mot de passe') }}</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="small text-decoration-none">{{ __('Mot de passe oublié ?') }}</a>
                @endif
            </div>
            <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="{{ __('Mot de passe') }}" required autocomplete="current-password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-3">
            <input wire:model="remember" class="form-check-input" type="checkbox" id="remember">
            <label class="form-check-label small" for="remember">{{ __('Se souvenir de moi') }}</label>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary w-100">
            <span wire:loading.remove wire:target="login">{{ __('Se connecter') }}</span>
            <span wire:loading wire:target="login"><span class="spinner-border spinner-border-sm me-1"></span>{{ __('Connexion...') }}</span>
        </button>
    </form>
</div>
