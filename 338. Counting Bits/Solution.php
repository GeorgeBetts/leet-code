<?php

/**
 * Solution for 338. Counting Bits
 * Given an integer n, return an array ans of length n + 1 such that for each i (0 <= i <= n)
 * ans[i] is the number of 1's in the binary representation of i.
 */
class Solution
{

    /**
     * @param Integer $n
     * @return Integer[]
     */
    public function countBits($n)
    {
        $result = [];
        for ($i = 0; $i <= $n; $i++) {
            $x = $i;
            $y = $i;
            $ones = 0;
            while ($y > 0) {
                if (($y % 2) > 0) {
                    $ones++;
                };
                $y = (int)($y / 2);
                $x++;
            }
            $result[] = $ones;
        }
        return $result;
    }
}
