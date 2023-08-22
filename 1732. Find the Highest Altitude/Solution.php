<?php

/**
 * Solution for 1732. Find the Highest Altitude
 *
 * There is a biker going on a road trip.
 * The road trip consists of n + 1 points at different altitudes.
 * The biker starts his trip on point 0 with altitude equal 0.
 *
 * You are given an integer array gain of length n where gain[i] is
 * the net gain in altitude between points i​​​​​​ and i + 1 for all (0 <= i < n).
 * Return the highest altitude of a point.
 */
class Solution
{

    /**
     * @param Int[] $gain
     * @return Integer
     */
    public function largestAltitude($gain)
    {
        $largestAltitude = 0;
        $altitude  = 0;
        $count = count($gain);
        for ($i = 0; $i < $count; $i++) {
            $altitude += $gain[$i];
            if ($altitude > $largestAltitude) {
                $largestAltitude = $altitude;
            }
        }
        return $largestAltitude;
    }
}
