<?php

namespace Ludo237\Rules\Tests;

use Ludo237\Rules\WithoutSpaceRule;

/**
 * @group Rules
 */
class WithoutSpacesRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Ludo237\Rules\WithoutSpaceRule
     */
    public function a_string_passes_without_spaces()
    {
        $rule = new WithoutSpaceRule();
        
        $this->assertTrue(
            $rule->passes("input", "avalidstring")
        );
        
        $this->assertFalse(
            $rule->passes("input", "not a valid string")
        );
    }
    
    /**
     * @test
     * @covers \Ludo237\Rules\WithoutSpaceRule
     */
    public function it_displays_the_right_message()
    {
        $rule = new WithoutSpaceRule();
        
        $this->assertEquals("The attribute :attribute contains spaces", $rule->message());
    }
}
