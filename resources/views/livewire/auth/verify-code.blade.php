<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\TwoFactorCode as TwoFactorCodeNotification;
use App\Models\TwoFactorCode as TwoFactorCodeModel;
use Carbon\Carbon;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $code = '';
    public string $maskedEmail = '';

    public function mount()
    {
        $user = Auth::user();
        $this->maskedEmail = $user ? $user->email : 'correo@ejemplo.com';

        // Solo genera y envía el código si no existe en sesión
        if (!Session::has('two_factor_code')) {
            $this->sendCode();
        }
    }

    public function sendCode()
    {
        $user = Auth::user();
        $code = rand(100000, 999999);

        // Elimina códigos anteriores
        TwoFactorCodeModel::where('user_id', $user->id)->delete();

        // Guarda el nuevo código con vencimiento
        TwoFactorCodeModel::create([
            'user_id' => $user->id,
            'code' => $code,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);

        $user->notify(new TwoFactorCodeNotification($code));
    }

    public function verifyCode()
    {
        $user = Auth::user();
        $twoFactor = TwoFactorCodeModel::where('user_id', $user->id)
            ->where('code', $this->code)
            ->where('expires_at', '>', now())
            ->first();

        if ($twoFactor) {
            $twoFactor->delete(); // Elimina el código usado
            return redirect()->route('dashboard');
        } else {
            $this->addError('code', 'El código es incorrecto o ha expirado.');
        }
    }

    public function resendCode()
    {
        $this->sendCode();
        session()->flash('message', 'El código ha sido reenviado.');
    }
}; ?>

<div class="flex flex-col gap-6">
    <h2 class="text-2xl font-bold text-center mb-2">Verificación con codigo</h2>
    <div class="flex flex-col items-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 mb-2 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <rect width="20" height="14" x="2" y="5" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
            <path stroke="currentColor" stroke-width="2" d="M2 5l10 7 10-7"/>
        </svg>
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

