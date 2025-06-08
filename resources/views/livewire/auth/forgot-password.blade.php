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

        session()->flash('status', __('Se enviará un enlace de reinicio si existe la cuenta..'));
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Olvidaste tu contraseña')" :description="__('Ingrese su correo electrónico para recibir un enlace de restablecimiento de contraseña')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6 bg-white p-8 rounded-xl shadow-md">
        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('Correo electrónico')" type="email" required autofocus
            placeholder="email@example.com" class="border border-zinc-500 focus:ring-2 focus:ring-zinc-600 rounded-md" />

        <!-- Submit Button -->
        <flux:button variant="primary" type="submit" class="w-full bg-black hover:bg-gray-800 text-white rounded-lg">
            {{ __('Enviar correo') }}
        </flux:button>

    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        {{ __('O bien, vuelva a') }}
        <flux:link :href="route('login')" wire:navigate class="text-black hover:text-green-700 font-bold">
            {{ __('Iniciar sesión') }}
        </flux:link>

    </div>
</div>
