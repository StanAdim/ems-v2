<?php

namespace App\Rules;

use App\Models\Member;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailPhoneAndMembershipNumberMatchesAnyMember implements ValidationRule
{
    public function __construct(private $email, private $phoneNumber)
    {
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $member = Member::whereJsonContains('phone_number', $this->phoneNumber)
            ->whereJsonContains('email', $this->email)
            ->whereRegistrationNumber($value)
            ->first();

        if (!$member) {
            $fail('The :attribute is not valid or found in the system. Make sure your phone number and email matches the ones you registered with.');
        }
    }
}
