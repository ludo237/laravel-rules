<?php

namespace Ludo237\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Date;

/**
 * Class NotExpired
 * @package Ludo237\Rules
 */
class NotExpired implements Rule
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