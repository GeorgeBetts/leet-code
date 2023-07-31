<?php

/**
 * Solution class for problem 412. Fizz Buzz
 * 
 * Link: https://leetcode.com/problems/fizz-buzz
 */
class Solution
{

    /**
     * When given an integer (n) outputs a string of length n based
     * on the FizzBuzz problem
     *
     * @param int $n The length of the output FizzBuzz string
     * 
     * @return string[]
     */
    function fizzBuzz($n)
    {
        $result = [];
        for ($i = 1; $i <= $n; $i++) {
            $isDivisibleByFive = ($i % 5 == 0);
            $isDivisibleByThree = ($i % 3 == 0);
            if ($isDivisibleByFive && $isDivisibleByThree) {
                $result[] = "FizzBuzz";
            } elseif (!$isDivisibleByFive && $isDivisibleByThree) {
                $result[] = "Fizz";
            } elseif ($isDivisibleByFive && !$isDivisibleByThree) {
                $result[] = "Buzz";
            } else {
                $result[] = (string)$i;
            }
        }

        return $result;
    }
}
