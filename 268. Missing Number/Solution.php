<?php

/**
 * Solution for 268. Missing Number
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function missingNumber($nums)
    {
        sort($nums);
        $count = count($nums);
        for ($i = 0; $i < $count; $i++) {
            if ($nums[$i] !== $i) {
                return $i;
            }
        }
        return $i;
    }

    /**
     * This method avoids sorting the nums first for O(N) performance
     *
     * @param Integer[] $nums
     * @return Integer
     */
    public function missingNumberAlternate($nums)
    {
        $count = count($nums);
        $hashTable  = [];
        for ($i = 0; $i < $count; $i++) {
            $hashTable[$nums[$i]] = true;
        }
        for ($i = 0; $i < $count; $i++) {
            if (!isset($hashTable[$i])) {
                return $i;
            }
        }
        return $i;
    }
}
