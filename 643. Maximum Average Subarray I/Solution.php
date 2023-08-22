<?php

/**
 * Solution for 643. Maximum Average Subarray I

 * You are given an integer array nums consisting of n elements, and an integer k.
 * Find a contiguous subarray whose length is equal to k that has the maximum average value and return this value. Any answer with a calculation error less than 10-5 will be accepted.
 */
class Solution
{

    /**
     * @param Int[] $nums
     * @param Int $k
     * @return Float
     */
    public function findMaxAverage($nums, $k)
    {
        $count = count($nums);
        $sum = 0;
        $maxAverage = null;
        for ($i = 0; $i < $count; $i++) {
            $sum += $nums[$i];
            if ($i >= ($k - 1)) {
                if (($sum / $k) >= $maxAverage) {
                    $maxAverage = $sum / $k;
                }
                $sum -= $nums[$i - ($k - 1)];
            }
        }
        return $maxAverage;
    }
}
