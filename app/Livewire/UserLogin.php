<?php

namespace App\Livewire;

use App\Providers\RouteServiceProvider;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserLogin extends Component
{
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required')]
    public $password = '';
    public $remember = false;
    public function render()
    {
        return view('livewire.user-login');
    }

    public function login()
    {
        $credentials = $this->validate();

        if (auth()->attempt($credentials, $this->remember)) {
            session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $this->addError('email', 'Invalid credentials.');
    }
}
