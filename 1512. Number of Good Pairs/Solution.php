<?php

/**
 * Solution for 1512. Number of Good Pairs
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function numIdenticalPairs($nums)
    {
        $count = count($nums);
        $occurences = [];
        for ($i = 0; $i < $count; $i++) {
            if (!isset($occurences[$nums[$i]])) {
                $occurences[$nums[$i]] = 1;
            } else {
                $occurences[$nums[$i]] += 1;
            }
        }
        $pairs = 0;
        foreach ($occurences as $key => $val) {
            if ($val >= 2) {
                $pairs += ($val * ($val - 1)) / 2;
            }
        }
        return $pairs;
    }
}


$solution = new Solution();
print_r($solution->numIdenticalPairs([1, 2, 3, 1, 1, 3]));
