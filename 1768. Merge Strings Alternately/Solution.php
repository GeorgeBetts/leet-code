<?php

/**
 * Solution for 1768. Merge Strings Alternately
 */
class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return String
     */
    public function mergeAlternately($word1, $word2)
    {
        $word1Arr = str_split($word1);
        $word2Arr = str_split($word2);
        $maxLen = max([strlen($word1), strlen($word2)]);
        $result = "";
        for ($i = 0; $i <= $maxLen - 1; $i++) {
            if (isset($word1Arr[$i])) {
                $result .= $word1Arr[$i];
            }
            if (isset($word2Arr[$i])) {
                $result .= $word2Arr[$i];
            }
        }
        return $result;
    }
}
