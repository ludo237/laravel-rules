<?php

namespace Ludo237\Rules\Tests;

use Ludo237\Rules\MatchPasswordRule;

/**
 * Class MatchPasswordRuleTest
 * @package Ludo237\Rules\Tests
 * @group Rules
 */
class MatchPasswordRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Ludo237\Rules\MatchPasswordRule
     */
    public function a_secure_match_must_pass_the_validation()
    {
        // Mocking the attribute but we don't care that much
        $hash = bcrypt("foobar");
        $rule = new MatchPasswordRule($hash);

        $this->assertTrue($rule->passes("input", "foobar"));
    }

    /**
     * @test
     * @covers \Ludo237\Rules\MatchPasswordRule
     */
    public function an_invalid_match_must_fail_the_validation()
    {
        // Mocking the attribute but we don't care that much
        $hash = bcrypt("foobar");
        $rule = new MatchPasswordRule($hash);

        $this->assertFalse($rule->passes("input", "fooba"));
        $this->assertFalse($rule->passes("input", "foobra"));
        $this->assertFalse($rule->passes("input", "FOOBAR"));
        $this->assertFalse($rule->passes("input", "FooBar"));
    }

    /**
     * @test
     * @covers \Ludo237\Rules\MatchPasswordRule
     */
    public function it_returns_a_valid_error_message()
    {
        $rule = new MatchPasswordRule("foobar");

        $this->assertNotEmpty($rule->message());
        $this->assertIsString($rule->message());
    }
}
