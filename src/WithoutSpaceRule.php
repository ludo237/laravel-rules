<?php

namespace Ludo237\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class WithoutSpaceRule
 * @package Ludo237\Rules
 */
class WithoutSpaceRule implements Rule
{
    public function passes($attribute, $value) : bool
    {
        return intval(preg_match('/^\S*$/u', $value)) === 1;
    }

    public function message() : string
    {
        return "The attribute :attribute contains spaces";
    }
}
