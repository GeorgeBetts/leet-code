<?php

/**
 * Solution for 628. Maximum Product of Three Numbers
 */
class Solution
{

    /**
     * @param [] $nums
     * @return Integer
     */
    public function maximumProduct($nums)
    {
        sort($nums);
        $count = count($nums);
        return max([$nums[0] * $nums[1] * $nums[$count - 1], $nums[$count - 1] * $nums[$count - 2] * $nums[$count - 3]]);
    }
}
