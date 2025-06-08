<?php

use Illuminate\Support\Facades\Route;

?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Verificación de Código')" :description="__('Ingrese el código de verificación enviado a su correo electrónico')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit.prevent="verifyCode" class="flex flex-col gap-6">
        <!-- Verification Code -->
        <flux:input wire:model="verification_code" :label="__('Código de Verificación')" type="text" required autofocus placeholder="Ingrese su código" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Verificar Código') }}</flux:button>
        </div>
    </form>

    <div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('¿No recibiste el código?') }}
        <flux:link wire:click.prevent="resendCode" class="text-black hover:text-green-700 font-bold">
            {{ __('Reenviar Código') }}
        </flux:link>
    </div>
</div>