<?php

/**
 * Solution for 1832. Check if the Sentence Is Pangram
 */
class Solution
{

    /**
     * @param String $sentence
     * @return Boolean
     */
    public function checkIfPangram($sentence)
    {
        $alphabetHash = [];
        $sentenceArr = str_split($sentence);
        $count = count($sentenceArr);
        $chars = 0;
        for ($i = 0; $i < $count; $i++) {
            if ($count - $i < 26 - $count) {
                return false;
            }
            if (empty($alphabetHash[$sentenceArr[$i]])) {
                $alphabetHash[$sentenceArr[$i]] = true;
                $chars++;
            }
            if ($chars == 26) {
                return true;
            }
        }

        return false;
    }
}
