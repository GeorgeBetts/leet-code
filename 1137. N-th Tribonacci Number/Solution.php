<?php

/**
 * Solution for 1137. N-th Tribonacci Number
 *
 * The Tribonacci sequence Tn is defined as follows:
 *
 * T0 = 0, T1 = 1, T2 = 1, and Tn+3 = Tn + Tn+1 + Tn+2 for n >= 0.
 *
 * Given n, return the value of Tn.
 */
class Solution
{

    /**
     * @param Int $n
     * @return Int
     */
    public function tribonacci($n)
    {
        $tribonacci = [0, 1, 1];
        $i = 3;
        while ($i <= $n) {
            $tribonacci[] =
                $tribonacci[$i - 1]
                + $tribonacci[$i - 2]
                + $tribonacci[$i - 3];
            $i++;
        }
        return $tribonacci[$n];
    }
}
