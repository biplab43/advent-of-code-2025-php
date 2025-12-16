<?php

declare(strict_types=1);
namespace Aoc2025\Day01;

class Part2
{
    public static function dial(int $currentPosition, string $instruction, int $password): array
    { 
        $direction = $instruction[0];
        $steps = (int) substr($instruction, 1);

        if ($direction === "L") {
            $newPosition = $currentPosition - $steps;

            if(($newPosition <= 0) && $currentPosition!== 0){
                $password++;
            }   
        } 
        elseif ($direction === "R") {
            $newPosition = $currentPosition + $steps;
        } 
        else {
            throw new \InvalidArgumentException(
                "Invalid instruction: {$instruction}. It should start with L or R."
            );
        }

        $password = $password + (int) abs($newPosition / 100);

        $wrappedPosition = $newPosition % 100;
        $newPosition = ($wrappedPosition < 0) ? $wrappedPosition + 100: $wrappedPosition;
        
        return [
        'newPosition' => $newPosition,
        'password'    => $password,
        ];
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
            $result = self::dial($position, $instruction, $password);
            $password = $result['password'];
            $position = $result['newPosition'];
        }
        return $password;
    }
}