<?php

declare(strict_types=1);

namespace Aoc2025\Tests;

use PHPUnit\Framework\TestCase;
use Aoc2025\Day02\Part1;
use Aoc2025\Day02\Part2;

final class Day02Test extends TestCase
{
    public function testPart1ValidId(): void
    {
        $validityOfID = Part1::isValidId("1");
        $this->assertSame(true, $validityOfID);

        $validityOfID = Part1::isValidId("12");
        $this->assertSame(true, $validityOfID);

        $validityOfID = Part1::isValidId("1212");
        $this->assertSame(false, $validityOfID);

        $validityOfID = Part1::isValidId("243424");
        $this->assertSame(true, $validityOfID);

        $validityOfID = Part1::isValidId("010");
        $this->assertSame(false, $validityOfID);
    } 
   
    public function testPart1InvalidIdSumForRange(): void
    {
        $range = "00-00";
        $invalidIdSumForRange = Part1::invalidIdSumForRange($range);
        $this->assertSame(0, $invalidIdSumForRange);

        $range = "01-03";
        $invalidIdSumForRange = Part1::invalidIdSumForRange($range);
        $this->assertSame(6, $invalidIdSumForRange);

        $range = "11-22";
        $invalidIdSumForRange = Part1::invalidIdSumForRange($range);
        $this->assertSame(33, $invalidIdSumForRange);

        $range = "010-015";
        $invalidIdSumForRange = Part1::invalidIdSumForRange($range);
        $this->assertSame(75, $invalidIdSumForRange);

        $range = "098-105";
        $invalidIdSumForRange = Part1::invalidIdSumForRange($range);
        $this->assertSame(197, $invalidIdSumForRange);

        $range = "098-1000";
        $invalidIdSumForRange = Part1::invalidIdSumForRange($range);
        $this->assertSame(197, $invalidIdSumForRange);
    }

    public function testPart1InvalidIDsResult(): void
    {
        $input = "01-03,22-33";
        $totalInvalidIdSum = Part1::solve($input);
        $this->assertSame(61, $totalInvalidIdSum);

        $input = "11-22,95-115,998-1012,1188511880-1188511890,222220-222224,1698522-1698528,446443-446449,38593856-38593862,565653-565659,824824821-824824827,2121212118-2121212124";
        $totalInvalidIdSum = Part1::solve($input);
        $this->assertSame(1227775554, $totalInvalidIdSum);
    }



    public function testPart2ValidId(): void
    {
        $validityOfID = Part2::isValidId("1");
        $this->assertSame(true, $validityOfID);

        $validityOfID = Part2::isValidId("12");
        $this->assertSame(true, $validityOfID);

        $validityOfID = Part2::isValidId("22");
        $this->assertSame(false, $validityOfID);

        $validityOfID = Part2::isValidId("1212");
        $this->assertSame(false, $validityOfID);

        $validityOfID = Part2::isValidId("112");
        $this->assertSame(true, $validityOfID);

        $validityOfID = Part2::isValidId("999");
        $this->assertSame(false, $validityOfID);

        $validityOfID = Part2::isValidId("1188511885");
        $this->assertSame(false, $validityOfID);

        $validityOfID = Part2::isValidId("446446");
        $this->assertSame(false, $validityOfID);

        $validityOfID = Part2::isValidId("565656");
        $this->assertSame(false, $validityOfID);

        $validityOfID = Part2::isValidId("99121");
        $this->assertSame(true, $validityOfID);

    }


    public function testPart2InvalidIdSumForRange(): void
    {
        $range = "00-00";
        $invalidIdSumForRange = Part2::invalidIdSumForRange($range);
        $this->assertSame(0, $invalidIdSumForRange);

        $range = "12-21";
        $invalidIdSumForRange = Part2::invalidIdSumForRange($range);
        $this->assertSame(0, $invalidIdSumForRange);

        $range = "11-22";
        $invalidIdSumForRange = Part2::invalidIdSumForRange($range);
        $this->assertSame(33, $invalidIdSumForRange);

        $range = "95-115";
        $invalidIdSumForRange = Part2::invalidIdSumForRange($range);
        $this->assertSame(210, $invalidIdSumForRange);

        $range = "998-1012";
        $invalidIdSumForRange = Part2::invalidIdSumForRange($range);
        $this->assertSame(2009, $invalidIdSumForRange);

        $range = "2121212118-2121212124";
        $invalidIdSumForRange = Part2::invalidIdSumForRange($range);
        $this->assertSame(2121212121, $invalidIdSumForRange);
    }

    public function testPart2InvalidIDsResult(): void
    {
        $input = "11-22,95-115";
        $totalInvalidIdSum = Part2::solve($input);
        $this->assertSame(243, $totalInvalidIdSum);

        $input = "11-22,95-115,998-1012,1188511880-1188511890,222220-222224,1698522-1698528,446443-446449,38593856-38593862,565653-565659,824824821-824824827,2121212118-2121212124";
        $totalInvalidIdSum = Part2::solve($input);
        $this->assertSame(4174379265, $totalInvalidIdSum);
    }
    
}