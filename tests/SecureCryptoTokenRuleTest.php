<?php

namespace Ludo237\Rules\Tests;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Ludo237\Rules\SecureCryptoTokenRule;

/**
 * @group Rules
 */
class SecureCryptoTokenRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Ludo237\Rules\SecureCryptoTokenRule
     * @covers \Ludo237\Rules\SecureCryptoTokenRule::passes
     */
    public function a_secure_match_must_pass_the_validation()
    {
        $rule = new SecureCryptoTokenRule([1234, "foo bar"], "_");

        $this->assertTrue(
            $rule->passes("input", Crypt::encrypt("1234_foo bar"))
        );
    }

    /**
     * @test
     * @covers \Ludo237\Rules\SecureCryptoTokenRule
     * @covers \Ludo237\Rules\SecureCryptoTokenRule::passes
     */
    public function an_invalid_match_must_fail_the_validation()
    {
        $rule = new SecureCryptoTokenRule([1234, "foo bar"], "_");

        $this->assertFalse(
            $rule->passes("input", Crypt::encrypt("1234+foo bar"))
        );

        $this->assertFalse(
            $rule->passes("input", Crypt::encrypt("foo bar_1234"))
        );

        $this->assertFalse(
            $rule->passes("input", Str::random())
        );
    }

    /**
     * @test
     * @covers \Ludo237\Rules\SecureCryptoTokenRule::message
     */
    public function it_returns_a_valid_error_message()
    {
        $rule = new SecureCryptoTokenRule([1234, "foo bar"], "_");

        $this->assertNotEmpty($rule->message());
        $this->assertIsString($rule->message());
    }
}
