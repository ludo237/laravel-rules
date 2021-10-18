<?php

namespace Ludo237\Rules;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Crypt;

/**
 * Class SecureCryptoTokenRule
 * @package Ludo237\Rules
 */
class SecureCryptoTokenRule implements Rule
{
    private array $params;
    private string $glue;

    /**
     * Create a new rule instance.
     *
     * @param array $params
     * @param string $glue
     */
    public function __construct(array $params, string $glue)
    {
        $this->params = $params;
        $this->glue = $glue;
    }

    public function passes($attribute, $value) : bool
    {
        try {
            return implode($this->glue, $this->params) === Crypt::decrypt($value, true);
        } catch (DecryptException $exception) {
            // TODO This can lead to an attack attempt we could log the invalid payload if we need
            return false;
        }
    }

    public function message() : string
    {
        return "The attribute :attribute contains an invalid crypto token";
    }
}
