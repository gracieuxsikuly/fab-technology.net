<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PasswordReset) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div>
    <h4 class="mb-1 fw-bold">{{ __('Réinitialiser le mot de passe') }}</h4>
    <p class="text-muted small mb-4">{{ __('Veuillez entrer votre nouveau mot de passe') }}</p>

    @if (session('status'))
        <div class="alert alert-success text-center small">{{ session('status') }}</div>
    @endif

    <form wire:submit="resetPassword">
        <div class="mb-3">
            <label for="email" class="form-label small fw-semibold">{{ __('Email') }}</label>
            <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" required autocomplete="email">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label small fw-semibold">{{ __('Mot de passe') }}</label>
            <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="new-password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label small fw-semibold">{{ __('Confirmer le mot de passe') }}</label>
            <input wire:model="password_confirmation" type="password" class="form-control" id="password_confirmation" required autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary w-100">{{ __('Réinitialiser le mot de passe') }}</button>
    </form>
</div>
