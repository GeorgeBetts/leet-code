<?php

/**
 * Solution for 2351. First Letter to Appear Twice
 *
 */
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function repeatedCharacter($s)
    {
        $sArr = str_split($s);
        $sHash = [];
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            if (!empty($sHash[$sArr[$i]])) {
                return $sArr[$i];
            }
            $sHash[$sArr[$i]] = true;
        }

        return "";
    }
}
