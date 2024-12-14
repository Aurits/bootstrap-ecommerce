<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<main class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 fade-in">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login</h2>

                    <form wire:submit="login">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email address</label>
                            <input wire:model="form.email" type="email" class="form-control" id="loginEmail" required />
                            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input wire:model="form.password" type="password" class="form-control" id="loginPassword"
                                required />
                            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                        </div>
                        <div class="mb-3 form-check">
                            <input wire:model="form.remember" type="checkbox" class="form-check-input"
                                id="rememberMe" />
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">
                            <span>Login</span>
                        </button>
                        <div class="text-center mt-3">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password?</a>
                        </div>
                        <div class="text-center mt-3">
                            <span>Don't have an account? </span>
                            <a href="{{ route('register') }}" class="text-decoration-none text-primary">
                                Register here
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>