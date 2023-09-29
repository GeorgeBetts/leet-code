<?php

/**
 * Solution for 896. Monotonic Array
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isMonotonic($nums)
    {
        $count = count($nums);
        if ($count == 0) {
            return false;
        }
        if ($count == 1) {
            return true;
        }
        $direction = ($nums[0] < $nums[$count - 1]) ? 'increasing' : 'decreasing';
        for ($i = 1; $i < $count; $i++) {
            if ($direction == 'decreasing' && ($nums[$i] > $nums[$i - 1])) {
                return false;
            }
            if ($direction == 'increasing' && ($nums[$i] < $nums[$i - 1])) {
                return false;
            }
        }
        return true;
    }
}

$solution = new Solution();
print_r($solution->isMonotonic([1, 1, 1, 2, 2, 3, 2]));
