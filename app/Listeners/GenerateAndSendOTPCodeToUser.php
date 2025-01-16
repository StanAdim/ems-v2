<?php

namespace App\Listeners;

use App\Events\UserIsLoggingIn;
use App\Mail\OTPCodeMail;
use App\Models\User;
use Hash;
use Mail;

class GenerateAndSendOTPCodeToUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserIsLoggingIn $event): void
    {
        $user = User::whereEmail($event->email)->first();

        // Generate and set a token for this user
        $token = self::generateOtp();
        $user->otp_token = Hash::make($token);
        $user->otp_expires_at = now()->addMinutes(15);
        $user->save();

        Mail::to($event->email)
            ->send(new OTPCodeMail($user, $token));
    }

    private static function generateOtp(): string
    {
        $secretKey = config('app.key');
        $digits = 6;
        $interval = 30;

        // Get the current time in intervals (30-second slots by default)
        $timeSlot = floor(time() / $interval);

        // Hash the secret key and time slot for uniqueness
        $hash = hash_hmac('sha1', $timeSlot, $secretKey);

        // Convert the hash to an integer
        $otp = hexdec(substr($hash, -$digits)) % pow(10, $digits);

        // Pad with zeros to ensure it has the desired number of digits
        $code = str_pad($otp, $digits, '0', STR_PAD_LEFT);

        return $code;
    }
}
