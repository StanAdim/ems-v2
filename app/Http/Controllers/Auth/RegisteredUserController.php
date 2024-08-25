<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EventModel;
use App\Models\User;
use App\Models\UserProfile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(?EventModel $event = null): View
    {
        $event = $event ?: EventModel::latest()->first();
        return view('auth.register', [
            'event' => $event,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],
            'registration_status' => ['required'],
            'institution_name' => ['required'],
            'position' => ['required'],
            'nationality' => ['required'],
            'address' => ['required'],
            'region' => ['required'],
            'district' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name . ' ' . $request->middle_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {
                $user->roles()->detach();

                $address_obj = [
                    "physical_address" => $request->address,
                    "region" => $request->region,
                    "district" => $request->district,
                ];

                $address_json = json_encode($address_obj);

                UserProfile::create([
                    'user_id' => $user->id,
                    'phone_number' => $request->phone_number,
                    'registration_status' => $request->registration_status,
                    'institution_name' => $request->institution_name,
                    'position' => $request->position,
                    'nationality' => $request->nationality,
                    'address' => $address_json,
                    'can_receive_notification' => true,

                ]);
            }

            DB::commit();

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("Registration Failed: " . $e->getMessage());

            throw $e;
        }
    }
}
