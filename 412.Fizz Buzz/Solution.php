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
        $arr = range(1, $n);
        $result = [];
        foreach ($arr as $i) {
            $isDivisibleByFive = is_int($i / 5);
            $isDivisibleByThree = is_int($i / 3);
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
