<?php

/**
 * Solution for puzzle 1929 Concatenation of Array
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function getConcatenation($nums)
    {
        return [...$nums, ...$nums];
    }
}
