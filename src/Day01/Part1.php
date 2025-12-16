<?php

declare(strict_types=1);
namespace Aoc2025\Day01;

class Part1
{
    public static function dial(int $currentPosition, string $instruction): int
    {
        $direction = $instruction[0];
        $steps = (int) substr($instruction, 1);

        if ($direction === "L") {
            $newPosition = $currentPosition - $steps;
        } 
        elseif ($direction === "R") {
            $newPosition = $currentPosition + $steps;
        } 
        else {
            throw new \InvalidArgumentException(
                "Invalid instruction: {$instruction}. It should start with L or R."
            );
        }

        $newPosition = $newPosition % 100;
        
        if ($newPosition < 0) {
            $newPosition = $newPosition + 100;
        }

        return $newPosition;
    }


    public static function solve(?string $input = null): int
    {
        if ($input === null){
            $instructions = file(__DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        } 
        else {
        $instructions = preg_split('/\R+/', trim($input)) ?: [];
        }

        $position = 50;
        $password = 0;

        foreach($instructions as $instruction){
            $newPosition = self::dial($position, $instruction);

            if($newPosition === 0){
                $password++;
            }
            $position = $newPosition;
        }
        return $password;
    }
        
}