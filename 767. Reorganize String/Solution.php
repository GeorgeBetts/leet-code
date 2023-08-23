<?php

/**
 * Solution for 767. Reorganize String
 *
 * Given a string s, rearrange the characters of s so that any two adjacent characters are not the same.
 */
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function reorganizeString($s)
    {
        $strArr = str_split($s);
        $count = count($strArr);
        if ($count == 1) {
            return "";
        }
        if ($count == 2) {
            return ($strArr[0] !== $strArr[1]) ? $s : "";
        }
        $sorted = false;
        while ($sorted == false) {
            $sorted = true;
            for ($i = 0; $i < $count - 1; $i++) {
                if ($strArr[$i] == $strArr[$i + 1]) {
                    continue;
                }
                if ($i >= 1 && $strArr[$i] == $strArr[$i - 1]) {
                    $temp = $strArr[$i];
                    $strArr[$i] = $strArr[$i + 1];
                    $strArr[$i + 1] = $temp;
                    $sorted = false;
                }
            }
        }
        return ($strArr[$count - 1] !== $strArr[$count - 2]) ? implode($strArr) : "";
    }
}
