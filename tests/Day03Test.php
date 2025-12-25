<?php

declare(strict_types=1);

namespace Aoc2025\Tests;

use PHPUnit\Framework\TestCase;
use Aoc2025\Day03\Part1;
//use Aoc2025\Day02\Part2;

final class Day03Test extends TestCase
{
    public function testPart1MaxJoltageForBank(): void
    {
        //Given a bank of batteries
        //When I choose exactly two batteries without rearranging them
        //Then it should return the maximum possible two-digit number formed by choosing any two digits in order (not necessarily adjacent)        
        $maxJoltage = Part1::maxJoltageForBank("987654321111111");
        $this->assertSame(98, $maxJoltage);

        //test when the bank has only two batteries
        $maxJoltage = Part1::maxJoltageForBank("69");
        $this->assertSame(69, $maxJoltage);

        //test when the maximum joltage digits are at start and end
        $maxJoltage = Part1::maxJoltageForBank("811111111111119");
        $this->assertSame(89, $maxJoltage);

        //test when the maximum joltage digits are at the end
        $maxJoltage = Part1::maxJoltageForBank("5356324527498");
        $this->assertSame(98, $maxJoltage);

        //test when all digits are same
        $maxJoltage = Part1::maxJoltageForBank("88888888888");
        $this->assertSame(88, $maxJoltage);

    }
   
    public function testPart1TotalJoltage(): void
    {
        $input = "69\n1234\n1181";
        $totalJoltage = Part1::solve($input);
        $this->assertSame(184, $totalJoltage);

        $input = "987654321111111\n811111111111119\n234234234234278\n818181911112111";
        $totalJoltage = Part1::solve($input);
        $this->assertSame(357, $totalJoltage);
    }   
    
}