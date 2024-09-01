<?php

namespace App\Rules;

use App\Models\Member;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MembershipRegistrationNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $member = Member::whereRegistrationNumber($value)->first();
        if (!$member) {
            $fail('The :attribute is not valid or found in the system.');
        }
    }
}
