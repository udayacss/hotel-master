<?php

namespace App\Rules;

use App\Models\Referral;
use Illuminate\Contracts\Validation\Rule;

class ReferralRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $is_valid = Referral::where('ref_no', $value)->where('status', 1)->first();
        if (isset($is_valid)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Referral is not valid.';
    }
}
