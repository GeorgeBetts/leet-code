<?php

/**
 * Solution for 387. First Unique Character in a String
 */
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function firstUniqChar($s)
    {
        $strArr = str_split($s);
        $sHash = [];
        $count = count($strArr);
        for ($i = 0; $i < $count; $i++) {
            if (empty($sHash[$strArr[$i]])) {
                $sHash[$strArr[$i]] = [$i, 1];
            } else {
                $sHash[$strArr[$i]][1] += 1;
            }
        }
        foreach ($sHash as $key => $val) {
            if ($val[1] == 1) {
                return $val[0];
            }
        }
        return -1;
    }
}
