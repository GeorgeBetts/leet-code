<?php

use Solution as GlobalSolution;

/**
 * Solution for 128. Longest Consecutive Sequence
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function longestConsecutive($nums)
    {
        // eliminate known cases for efficiency
        $count = count($nums);
        if ($count == 0) {
            return 0;
        }
        if ($count == 1) {
            return 1;
        }

        // create a hash table of the nums
        $hashTable = [];
        for ($i = 0; $i < $count; $i++) {
            $hashTable[$nums[$i]] = true;
        }

        // loop the table
        $bestSequence = 0;
        foreach ($hashTable as $key => $val) {
            // only start the sequence calculation from the lowest point
            if (isset($hashTable[$key - 1])) {
                continue;
            }
            // track highest and lowest in the current sequence
            $highest = $key;
            while (isset($hashTable[$highest])) {
                $highest++;
            }
            if ($highest - $key > $bestSequence) {
                $bestSequence = $highest - $key;
            }
        }
        return $bestSequence;
    }
}

$solution = new Solution();
print_r($solution->longestConsecutive([100, 4, 200, 1, 3, 2]));
