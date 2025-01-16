<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OtpRequest;
use App\Models\EventModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(?EventModel $event = null): View
    {
        $event = $event ?: EventModel::latest()->first();
        return view('auth.login', [
            'event' => $event,
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function validateOtp(string $email, ?string $otp = null): View
    {
        return view(
            'auth.validate-otp',
            [
                'email' => $email,
                'otp' => $otp
            ]
        );
    }

    public function loginWithOtp(string $email, OtpRequest $request): RedirectResponse
    {
        $request->authenticate($email);
        session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }
}
