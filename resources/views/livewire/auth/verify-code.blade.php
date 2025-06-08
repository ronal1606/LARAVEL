<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <h2 class="text-2xl font-bold text-center mb-2">Verificación del Segundo Paso</h2>
        <div class="flex flex-col items-center mb-4">
            <img src="/images/email-icon.png" alt="Email" class="w-16 mb-2" />
            <p class="text-center text-sm text-gray-700">
                Ingrese el código de verificación que enviamos<br>
                <span class="text-blue-700 font-semibold">{{ $maskedEmail ?? 'correo@ejemplo.com' }}</span>
            </p>
        </div>
        @if (session('message'))
            <div class="text-green-600 text-center">{{ session('message') }}</div>
        @endif
        <form wire:submit.prevent="verifyCode" class="flex flex-col gap-4 bg-white p-8 rounded-xl shadow-md">
            <input wire:model="code" type="text" maxlength="6" placeholder="Código"
                class="border border-zinc-500 focus:ring-2 focus:ring-zinc-600 rounded-md" required>
            @error('code')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
            <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white rounded-lg py-2 font-bold shadow">
                Enviar
            </button>
        </form>
        <div class="text-center text-sm mt-2 text-zinc-400">
            ¿No compaginó el código?
            <button wire:click="resendCode" class="font-bold text-black hover:text-green-700 ml-1">Reenviar</button>
        </div>
    </div>
</x-layouts.auth>
