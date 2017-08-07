<?php

/**
 * This is a function to calculate Fibonacci sequence
 *
 * @param array $numbers Input numbers
 * @param int $count Count of rows
 * @param array $result Array to store input
 * @return array
 */
function fibonacci(array $numbers, int $count = 10, array $result = [])
{
    // return if no rows left
    if ($count <= 0) {
        return $result;
    }

    // calculate next number
    $numbers[] = array_sum($numbers);

    // add current sequence to result
    $result[] = $numbers;

    // shift an array
    array_shift($numbers);

    // run it recursive
    return fibonacci($numbers, $count - 1, $result);
}
