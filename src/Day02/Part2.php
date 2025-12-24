<?php

declare(strict_types=1);
namespace Aoc2025\Day02;

class Part2
{
    public static function isValidId(string $id): bool
    {
        $length = strlen($id); 
        $half = (int) ($length / 2); 

        for($i=$half; $i>0; $i--){

            if($length % $i !== 0){
                continue;
            }

            $allSame = true;
            $parts = str_split($id,$i);
            $firstChunk = $parts[0];

            foreach($parts as $part){
                if($part !== $firstChunk){
                    $allSame = false;
                    break;
                }
            }
            
            if($allSame)
              return false;   
        }

        return true;
    }
    

    public static function invalidIdSumForRange(string $range): int
    {        
        [$startStr, $endStr] = explode('-', $range, 2);

        $width = strlen($startStr);

        $start = (int) $startStr;
        $end = (int) $endStr;

        $invalidIdSum = 0;

        for ($id = $start; $id <= $end; $id++) {
            $idStr = (string) $id;
            if (self::isValidId($idStr) === false) {
                $invalidIdSum = $invalidIdSum + (int) $idStr;
            }
        }

        return $invalidIdSum;
    }

    public static function solve(?string $input = null): int
    {
        if ($input === null){
            $input = file_get_contents(__DIR__ . '/input.txt');
        } 

        $ranges = explode(",", $input);

        $totalInvalidIdSum = 0;

        foreach($ranges as $range){
            $invalidIdSumForRange = self::invalidIdSumForRange($range);
            $totalInvalidIdSum = $totalInvalidIdSum + $invalidIdSumForRange;
        }

        return $totalInvalidIdSum;
    }     
}