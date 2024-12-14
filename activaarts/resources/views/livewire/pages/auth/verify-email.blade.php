<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
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

<main class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 fade-in">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Verify Your Email</h2>

                    <p class="text-muted text-center mb-4">
                        Thanks for signing up! Before getting started, please verify your email address by clicking on
                        the link we just emailed to you. If you didn’t receive the email, we will gladly send you
                        another.
                    </p>

                    @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success text-center" role="alert">
                        A new verification link has been sent to the email address you provided during registration.
                    </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">
                        <!-- Resend Verification Email -->
                        <button wire:click="sendVerification" class="btn btn-custom">
                            Resend Verification Email
                        </button>

                        <!-- Log Out -->
                        <button wire:click="logout" class="btn btn-outline-secondary">
                            Log Out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>