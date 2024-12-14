<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<main class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 fade-in">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Forgot Password</h2>

                    <p class="text-muted text-center mb-4">
                        Forgot your password? No problem. Just let us know your email address, and we’ll email you a
                        password reset link.
                    </p>

                    <!-- Session Status -->
                    <x-auth-session-status class="alert alert-success" :status="session('status')" />

                    <form wire:submit="sendPasswordResetLink">
                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model="email" type="email" class="form-control" id="email" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <button type="submit" class="btn btn-custom w-100">
                            <span>Email Password Reset Link</span>
                        </button>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none text-primary">
                                Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>