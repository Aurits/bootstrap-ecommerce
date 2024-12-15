<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section class=" py-5 mt-5">

    <div class="card-body">
        <h2 class="text-center mb-4">{{ __('Update Password') }}</h2>

        <p class="text-center text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

        <form wire:submit="updatePassword" class="mt-4">
            <!-- Current Password -->
            <div class="mb-3">
                <label for="update_password_current_password" class="form-label">
                    {{ __('Current Password') }}
                </label>
                <input wire:model="current_password" id="update_password_current_password" name="current_password"
                    type="password" class="form-control @error('current_password') is-invalid @enderror"
                    autocomplete="current-password" required>
                @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="update_password_password" class="form-label">
                    {{ __('New Password') }}
                </label>
                <input wire:model="password" id="update_password_password" name="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="update_password_password_confirmation" class="form-label">
                    {{ __('Confirm Password') }}
                </label>
                <input wire:model="password_confirmation" id="update_password_password_confirmation"
                    name="password_confirmation" type="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    autocomplete="new-password" required>
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Save Button -->
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
                <span class="text-success" wire:loading wire:target="updatePassword">
                    {{ __('Saving...') }}
                </span>
                <span class="text-success" wire:loading.remove wire:target="updatePassword">
                    <x-action-message on="password-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </span>
            </div>
        </form>
    </div>

</section>