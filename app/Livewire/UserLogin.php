<?php

namespace App\Livewire;

use App\Events\UserIsLoggingIn;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserLogin extends Component
{
    public $registration_action = '';

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

        $request = new LoginRequest($credentials + [$this->remember]);

        $request->authenticate();

        if (config('app.enforce_otp')) {
            Auth::guard('web')->logout();

            // Raise an Event to handle OTP Generation and Notifying Users Of login attempts
            UserIsLoggingIn::dispatch($credentials['email']);
            return redirect(route('validate_otp', ['email' => $credentials['email']]));
        }

        session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
