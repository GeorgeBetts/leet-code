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
}
