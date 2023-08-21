<?php

/**
 * Solution for 459. Repeated Substring Pattern
 * Given a string s, check if it can be constructed
 * by taking a substring of it and appending multiple copies of the substring together.
 */
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function repeatedSubstringPattern($s)
    {
        $strlen = strlen($s);
        if ($strlen == 1) {
            return false;
        }
        for ($i = 0; $i <= ceil(($strlen - 1) / 2); $i++) {
            if ($strlen % ($i + 1) == 0) {
                $search = substr($s, 0, $i + 1);
                $occurences = substr_count($s, $search, $i + 1, $strlen - ($i + 1));
                if (($occurences * ($i + 1)) + $i + 1 == $strlen) {
                    return true;
                }
            }
        }
        return false;
    }
}
