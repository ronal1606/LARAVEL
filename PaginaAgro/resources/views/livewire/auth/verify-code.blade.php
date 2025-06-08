<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Verificación de código')" :description="__('Ingrese el código de verificación enviado a su correo electrónico')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="verifyCode" class="flex flex-col gap-6">
        <!-- Verification Code -->
        <flux:input wire:model="verification_code" :label="__('Código de verificación')" type="text" required autofocus
            placeholder="Ingrese su código" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Verificar código') }}</flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('¿No recibiste el código?') }}
        <flux:link wire:click="resendCode" class="text-black hover:text-green-700 font-bold">
            {{ __('Reenviar código') }}
        </flux:link>
    </div>
</div>