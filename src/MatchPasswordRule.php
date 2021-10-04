<?php

namespace Ludo237\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

/**
 * Class MatchPasswordRule
 * @package Ludo237\Rules
 */
class MatchPasswordRule implements Rule
{
    private string $expected;

    /**
     * Create a new rule instance.
     *
     * @param string $expected
     */
    public function __construct(string $expected)
    {
        $this->expected = $expected;
    }

    public function passes($attribute, $value) : bool
    {
        return Hash::check($value, $this->expected);
    }

    public function message() : string
    {
        return "The provided password does not match";
    }
}
