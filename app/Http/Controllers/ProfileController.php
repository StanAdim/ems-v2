<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\UserProfile;
use App\Rules\EmailPhoneAndMembershipNumberMatchesAnyMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $nationalityChoices = Country::getNationalities();
        $oldNationality = UserProfile::where('user_id', $request->user()->id)->first()->nationality;
        $registrationStatuses = UserProfile::getRegistrationStatuses();
        $oldRegistrationStatus = UserProfile::where('user_id', $request->user()->id)->first()->registration_status;
        $oldRegistrationNumber = UserProfile::where('user_id', $request->user()->id)->first()->registration_number;
        $oldInstutionName = UserProfile::where('user_id', $request->user()->id)->first()->institution_name;
        $oldPosition = UserProfile::where('user_id', $request->user()->id)->first()->position;
        $oldPhoneNumber = UserProfile::where('user_id', $request->user()->id)->first()->phone_number;
        $oldAddress = UserProfile::where('user_id', $request->user()->id)->first()->address;

        return view('profile.edit', [
            'user' => $request->user(),
            'nationalityChoices' => $nationalityChoices,
            'oldNationality' => $oldNationality,
            'registrationStatuses' => $registrationStatuses,
            'oldRegistrationStatus' => $oldRegistrationStatus,
            'oldRegistrationNumber' => $oldRegistrationNumber,
            'oldInstutionName' => $oldInstutionName,
            'oldPosition' => $oldPosition,
            'oldPhoneNumber' => $oldPhoneNumber,
            'oldAddress' => $oldAddress,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $userProfile = UserProfile::where('user_id', $request->user()->id)->first();

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->registration_status === UserProfile::STATUS_REGISTERED) {

            $validator = Validator::make($request->all(), [
                'registration_number' => [
                    'required',
                    'string',
                    new EmailPhoneAndMembershipNumberMatchesAnyMember(
                        $request->email,
                        $request->phone_number
                    ),
                ],
            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            } else {
                $request->user()->save();
                $userProfile->nationality = $request->nationality;
                $userProfile->registration_status = $request->registration_status;
                $userProfile->registration_number = $request->registration_number;
                $userProfile->institution_name = $request->institution_name;
                $userProfile->position = $request->position;
                $userProfile->phone_number = $request->phone_number;
                // $userProfile->address = $request->address;
                $userProfile->save();
            }
        } else {
            $request->user()->save();
            $userProfile->nationality = $request->nationality;
            $userProfile->registration_status = $request->registration_status;
            $userProfile->registration_number = '';
            $userProfile->institution_name = $request->institution_name;
            $userProfile->position = $request->position;
            $userProfile->phone_number = $request->phone_number;
            // $userProfile->address = $request->address;
            $userProfile->save();
        }
        
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
