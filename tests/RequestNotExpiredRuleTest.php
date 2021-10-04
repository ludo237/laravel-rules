<?php

namespace Ludo237\Rules\Tests;

use Illuminate\Support\Facades\Date;
use Ludo237\Rules\RequestNotExpiredRule;

/**
 * Class RequestNotExpiredRuleTest
 * @package Ludo237\Rules\Tests
 */
class RequestNotExpiredRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Ludo237\Rules\NotExpired
     */
    public function a_not_expired_date_should_pass_the_validation()
    {
        $rule = new RequestNotExpiredRule();

        $this->assertTrue(
            $rule->passes("input", Date::now()->addHour()->timestamp)
        );

        $this->assertFalse(
            $rule->passes("input", Date::now()->subHour()->timestamp)
        );
    }

    /**
     * @test
     * @covers \Ludo237\Rules\NotExpired::message
     */
    public function it_returns_a_valid_error_message()
    {
        $rule = new RequestNotExpiredRule();

        $this->assertNotEmpty($rule->message());
        $this->assertIsString($rule->message());
    }
}
