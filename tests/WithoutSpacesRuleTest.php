<?php

namespace Tests\Unit\Rules;

use Support\Rules\WithoutSpaces;
use Tests\TestCase;

/**
 * Class WithoutSpaces
 * @package Tests\Unit\Rules
 * @group Rules
 */
class WithoutSpacesRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Support\Rules\WithoutSpaces
     */
    public function a_string_passes_without_spaces()
    {
        $rule = new WithoutSpaces();

        $this->assertTrue(
            $rule->passes("input", "avalidstring")
        );

        $this->assertFalse(
            $rule->passes("input", "not a valid string")
        );
    }

    /**
     * @test
     * @covers \Support\Rules\WithoutSpaces
     */
    public function it_displays_the_right_message()
    {
        $rule = new WithoutSpaces();

        $this->assertEquals("The attribute :attribute contains spaces", $rule->message());
    }
}
