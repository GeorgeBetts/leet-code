<?php

/**
 * Solution for 605. Can Place Flowers
 *
 */
class Solution
{

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    public function canPlaceFlowers($flowerbed, $n)
    {
        if ($n == 0) {
            return true;
        }
        $plotCount = count($flowerbed);
        $plantablePlots = 0;
        for ($i = 0; $i < $plotCount; $i++) {
            if ($flowerbed[$i] == 0 && ($i == 0 || $flowerbed[$i - 1] == 0) && ($i == $plotCount - 1 || $flowerbed[$i + 1] == 0)) {
                $plantablePlots++;
                $flowerbed[$i] = 1;
                // return early if we have reached the required number
                if ($plantablePlots >= $n) {
                    return true;
                }
                // next plantable plot is at least 2 plots away so skip
                $i += 1;
            }
        }
        return false;
    }
}
