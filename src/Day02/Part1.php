<?php

declare(strict_types=1);
namespace Aoc2025\Day02;

class Part1
{
    public static function isValidId(string $id)
    {   
        if ($id[0] === '0') {
            return false;
        }

        $length = strlen($id);
      
        if($length %2 !== 0){
            return true;
        }
        else{
            $half = $length / 2;
            $first = substr ($id, 0, $half);
            $second = substr ($id, $half);
            
            return ($first == $second) ? false: true;
        }

    }

    public static function invalidIdSumForRange(string $range): int
    {
        [$startStr, $endStr] = explode('-', $range, 2);

        $width = strlen($startStr);

        $start = (int) $startStr;
        $end = (int) $endStr;

        $invalidIdSum = 0;

        for ($id = $start; $id <= $end; $id++) {
            $idStr = str_pad((string) $id, $width, '0', STR_PAD_LEFT);
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