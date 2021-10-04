<?php

namespace Ludo237\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Date;

/**
 * Class RequestNotExpiredRule
 * @package Ludo237\Rules
 */
class RequestNotExpiredRule implements Rule
{
    public function passes($attribute, $value) : bool
    {
        return !($value && Date::now()->getTimestamp() > $value);
    }

    public function message() : string
    {
        return "The current request for :attribute is expired";
    }
}
