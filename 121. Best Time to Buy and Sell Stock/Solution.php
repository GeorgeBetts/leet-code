<?php

use Solution as GlobalSolution;

/**
 * Solution for 121. Best Time to Buy and Sell Stock
 */
class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    public function maxProfit($prices)
    {
        $count = count($prices);
        $lowestBuy = PHP_INT_MAX;
        $highestSell = 0;
        $best = 0;
        for ($i = 0; $i < $count; $i++) {
            if ($prices[$i] < $lowestBuy) {
                // save the best so far
                if ($highestSell > 0 && ($highestSell - $lowestBuy) > $best) {
                    $best = $highestSell - $lowestBuy;
                }
                // reset highest sell
                $highestSell = 0;
                $lowestBuy = $prices[$i];
            } elseif ($prices[$i] > $highestSell) {
                $highestSell = $prices[$i];
            }
        }
        return max([$best, $highestSell - $lowestBuy]);
    }
}

$solution = new Solution();
print_r($solution->maxProfit([4, 11, 2, 7, 1]));
