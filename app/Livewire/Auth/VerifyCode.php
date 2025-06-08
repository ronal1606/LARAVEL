<?php


namespace App\Livewire\Auth;

use Livewire\Component;

class VerifyCode extends Component
{
    public $code;
    public $maskedEmail = 'correo@ejemplo.com';

    public function verifyCode() {}
    public function resendCode() {}

    public function render()
    {
        return view('livewire.auth.verify-code');
    }
}