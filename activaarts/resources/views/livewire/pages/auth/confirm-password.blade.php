<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
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

<main class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 fade-in">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Confirm Password</h2>

                    <p class="text-muted text-center mb-4">
                        This is a secure area of the application. Please confirm your password before continuing.
                    </p>

                    <form wire:submit="confirmPassword">
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input wire:model="password" type="password" class="form-control" id="password" required
                                autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <button type="submit" class="btn btn-custom w-100">
                            <span>Confirm</span>
                        </button>

                        <div class="text-center mt-3">
                            <a href="{{ route('dashboard') }}" class="text-decoration-none text-primary">
                                Back to Dashboard
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>