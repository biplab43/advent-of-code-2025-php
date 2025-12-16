<?php

declare(strict_types=1);

namespace Aoc2025\Tests;

use PHPUnit\Framework\TestCase;
use Aoc2025\Day01\Part1;
use Aoc2025\Day01\Part2;

final class Day01Test extends TestCase
{
    public function testPart1DialMoves(): void
    {
        $newPosition = Part1::dial(50, "L0");
        $this->assertSame(50, $newPosition);

        $newPosition = Part1::dial(50, "L5");
        $this->assertSame(45, $newPosition);

        $newPosition = Part1::dial(50, "L50");
        $this->assertSame(0, $newPosition);

        $newPosition = Part1::dial(50, "L52");
        $this->assertSame(98, $newPosition);

        $newPosition = Part1::dial(50, "L152");
        $this->assertSame(98, $newPosition);

        $newPosition = Part1::dial(50, "L1052");
        $this->assertSame(98, $newPosition);

        $newPosition = Part1::dial(50, "R0");
        $this->assertSame(50, $newPosition);

        $newPosition = Part1::dial(50, "R5");
        $this->assertSame(55, $newPosition);

        $newPosition = Part1::dial(50, "R49");
        $this->assertSame(99, $newPosition);

        $newPosition = Part1::dial(50, "R50");
        $this->assertSame(0, $newPosition);

        $newPosition = Part1::dial(50, "R52");
        $this->assertSame(2, $newPosition);

        $newPosition = Part1::dial(50, "R152");
        $this->assertSame(2, $newPosition);

        $newPosition = Part1::dial(50, "R752");
        $this->assertSame(2, $newPosition);
    }

    public function testPart1PasswordResult(): void
    {
        $input = "L25";
        $password = Part1::solve($input);
        $this->assertSame(0, $password);

        $input = "L25\nL24";
        $password = Part1::solve($input);
        $this->assertSame(0, $password);

        $input = "L25\nL25";
        $password = Part1::solve($input);
        $this->assertSame(1, $password);

        $input = "L25\nL30";
        $password = Part1::solve($input);
        $this->assertSame(0, $password);

        $input = "R25";
        $password = Part1::solve($input);
        $this->assertSame(0, $password);

        $input = "R25\nR24";
        $password = Part1::solve($input);
        $this->assertSame(0, $password);

        $input = "R25\nR25";
        $password = Part1::solve($input);
        $this->assertSame(1, $password);

        $input = "R25\nR30";
        $password = Part1::solve($input);
        $this->assertSame(0, $password);

        $input = "L68\nL30\nR48\nL5\nR60\nL55\nL1\nL99\nR14\nL82";
        $password = Part1::solve($input);
        $this->assertSame(3, $password);
    }

    public function testPart2DialMoves(): void
    {
        $result = Part2::dial(50, "L0", 0);
        $this->assertSame(['newPosition'=>50, 'password'=>0], $result);

        $result = Part2::dial(50, "L5", 0);
        $this->assertSame(['newPosition'=>45, 'password'=>0], $result);

        $result = Part2::dial(50, "L50", 0);
        $this->assertSame(['newPosition'=>0, 'password'=>1], $result);

        $result = Part2::dial(50, "L52", 0);
        $this->assertSame(['newPosition'=>98, 'password'=>1], $result);

        $result = Part2::dial(50, "L152", 0);
        $this->assertSame(['newPosition'=>98, 'password'=>2], $result);

        $result = Part2::dial(50, "L352", 0);
        $this->assertSame(['newPosition'=>98, 'password'=>4], $result);

        $result = Part2::dial(0, "L5", 0);
        $this->assertSame(['newPosition'=>95, 'password'=>0], $result);

        $result = Part2::dial(0, "L0", 0);
        $this->assertSame(['newPosition'=>0, 'password'=>0], $result);

        $result = Part2::dial(0, "L200", 0);
        $this->assertSame(['newPosition'=>0, 'password'=>2], $result);

        $result = Part2::dial(50, "R5", 0);
        $this->assertSame(['newPosition'=>55, 'password'=>0], $result);

        $result = Part2::dial(50, "R49", 0);
        $this->assertSame(['newPosition'=>99, 'password'=>0], $result);

        $result = Part2::dial(50, "R50", 0);
        $this->assertSame(['newPosition'=>0, 'password'=>1], $result);

        $result = Part2::dial(50, "R52", 0);
        $this->assertSame(['newPosition'=>2, 'password'=>1], $result);

        $result = Part2::dial(50, "R152", 0);
        $this->assertSame(['newPosition'=>2, 'password'=>2], $result);

        $result = Part2::dial(50, "R552", 0);
        $this->assertSame(['newPosition'=>2, 'password'=>6], $result);

        $result = Part2::dial(0, "R5", 0);
        $this->assertSame(['newPosition'=>5, 'password'=>0], $result);

        $result = Part2::dial(0, "R0", 0);
        $this->assertSame(['newPosition'=>0, 'password'=>0], $result);
    }

    public function testPart2PasswordResult(): void
    {
        $input = "L25";
        $password = Part2::solve($input);
        $this->assertSame(0, $password);

        $input = "L25\nL24";
        $password = Part2::solve($input);
        $this->assertSame(0, $password);

        $input = "L25\nL25";
        $password = Part2::solve($input);
        $this->assertSame(1, $password);

        $input = "L25\nL30";
        $password = Part2::solve($input);
        $this->assertSame(1, $password);

        $input = "L25\nL30\nL200";
        $password = Part2::solve($input);
        $this->assertSame(3, $password);

        $input = "R25";
        $password = Part2::solve($input);
        $this->assertSame(0, $password);

        $input = "R25\nR24";
        $password = Part2::solve($input);
        $this->assertSame(0, $password);

        $input = "R25\nR25";
        $password = Part2::solve($input);
        $this->assertSame(1, $password);

        $input = "R25\nR30";
        $password = Part2::solve($input);
        $this->assertSame(1, $password);

        $input = "R25\nR30\nR400";
        $password = Part2::solve($input);
        $this->assertSame(5, $password);

        $input = "L68\nL30\nR48\nL5\nR60\nL55\nL1\nL99\nR14\nL82";
        $password = Part2::solve($input);
        $this->assertSame(6, $password);
    }
}