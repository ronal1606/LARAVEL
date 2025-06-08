<?php


namespace App\Livewire\Auth;

use Livewire\Component;

class VerifyCode extends Component
{
    public $code;
    public $maskedEmail = 'correo@ejemplo.com';

    public function verifyCode()
    {
        if ($this->code === '123456') { // Aquí deberías validar el código real
            session()->flash('message', '¡Código verificado correctamente!');
            // Redirigir o realizar la acción deseada
        } else {
            $this->addError('code', 'El código es incorrecto.');
        }
    }

    public function resendCode()
    {
        // Aquí deberías reenviar el código al usuario
        session()->flash('message', 'El código ha sido reenviado.');
    }

    public function render()
    {
        return view('livewire.auth.verify-code');
    }
}