<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

// Usage:
//   php run.php 1 1   -> Day 01 Part 1
//   php run.php 1 2   -> Day 01 Part 2
//   php run.php 10 1  -> Day 10 Part 1

$day  = $argv[1] ?? null;
$part = $argv[2] ?? null;

if ($day === null || $part === null) {
    fwrite(STDERR, "Usage: php run.php <day> <part>\n");
    exit(1);
}

// normalise values
$day  = str_pad((string) $day, 2, '0', STR_PAD_LEFT); // 1 -> "01"
$part = (string) $part;

// Build class name like Aoc2025\Day01\Part1
$class = "Aoc2025\\Day{$day}\\Part{$part}";

if (!class_exists($class)) {
    fwrite(STDERR, "Class {$class} not found.\n");
    exit(1);
}

if (!method_exists($class, 'solve')) {
    fwrite(
        STDERR,
        "Class {$class} must have a static solve method.\n"
    );
    exit(1);
}

$result = $class::solve();

echo $result;