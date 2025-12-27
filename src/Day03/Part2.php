<?php

declare(strict_types=1);
namespace Aoc2025\Day03;

class Part2
{
    private const DIGITS_TO_PICK = 12;

    public static function maxJoltageForBank(string $bank): int
    {

        $length = strlen($bank);
       
        $maximumJoltage = null;
        
        $nextPosition = 0;

        for($i = self::DIGITS_TO_PICK; $i > 0; $i--){

            $maxNumber = 0;
            for($j= $nextPosition; $j <= $length - $i ; $j++){
                
                $digit = (int) $bank[$j];

                if($digit > $maxNumber){
                    $maxNumber = $digit;
                    $nextPosition = $j+1;
                }

            }
            $maximumJoltage = $maximumJoltage.$maxNumber;
            
        }
        return (int) $maximumJoltage;

    }

    public static function solve(?string $input = null): int
    {   
        if ($input === null){
            $input = file(__DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        } 
        else {
        $input = preg_split('/\R+/', trim($input)) ?: [];
        }

        $totalJoltage = 0;
        foreach($input as $bank){
            $totalJoltage = self::maxJoltageForBank($bank) + $totalJoltage;
        }

       return $totalJoltage;
    }

}