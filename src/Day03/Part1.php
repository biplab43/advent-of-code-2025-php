<?php

declare(strict_types=1);
namespace Aoc2025\Day03;

class Part1
{
    public static function maxJoltageForBank(string $bank): int
    {
        $length = strlen($bank);

        if($length === 2){
            return (int) $bank;
        }
            
        $maxNumber = -1;
        $maxPosition = 0;
        $secondMaxNumber = -1;

        for($i = 0; $i < $length-1; $i++ ){
            $digit = (int) $bank[$i];

            if($digit > $maxNumber){
                $maxNumber = $digit;
                $maxPosition = $i;
            }
        }

        for($i = $maxPosition+1; $i<$length; $i++){
            $digit = (int) $bank[$i];
            
            if($digit > $secondMaxNumber){
                $secondMaxNumber = $digit;
            }
        }

        $maximumJoltage = $maxNumber*10 + $secondMaxNumber;
        
        return $maximumJoltage;
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