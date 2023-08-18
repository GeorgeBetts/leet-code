<?php

/**
 * Solution to problem 1615. Maximal Network Rank
 *
 * There is an infrastructure of n cities with some number of roads connecting these cities.
 * Each roads[i] = [ai, bi] indicates that there is a bidirectional road between cities ai and bi.
 * The network rank of two different cities is defined as the total number of directly connected roads to either city.
 * If a road is directly connected to both cities, it is only counted once.
 * The maximal network rank of the infrastructure is the maximum network rank of all pairs of different cities.
 * Given the integer n and the array roads, return the maximal network rank of the entire infrastructure.
 *
 */
class Solution
{

    /**
     * @param Int $n The number of cities
     * @param Int[][] $roads
     * @return Int
     */
    public function maximalNetworkRank($n, $roads)
    {
        $roadsPerCity = [];
        $count = count($roads);
        // tally the road connections for each city
        for ($i = 0; $i <= $count - 1; $i++) {
            if (!isset($roadsPerCity[$roads[$i][0]])) {
                $roadsPerCity[$roads[$i][0]] = [$roads[$i][0], 0];
            }
            if (!isset($roadsPerCity[$roads[$i][1]])) {
                $roadsPerCity[$roads[$i][1]] = [$roads[$i][1], 0];
            }
            $roadsPerCity[$roads[$i][0]][1]++;
            $roadsPerCity[$roads[$i][1]][1]++;
        }
        // sort the array and get the two highest, check whether they are connected, if so minus one
        usort($roadsPerCity, fn ($a, $b) => $b[1] <=> $a[1]);

        // get all city combinations which have the same maximum network rank
        $maximumNetworks = [];
        $highestARoad = 0;
        for ($a = 0; $a <= $n - 1; $a++) {
            if ($roadsPerCity[$a][1] < $highestARoad) {
                break;
            }
            for ($b = 0; $b <= $n - 1; $b++) {
                if ($b <= $a) {
                    continue;
                }
                $network = $roadsPerCity[$a][1] + $roadsPerCity[$b][1];
                if ($a == 0 && $b == 1) {
                    $maxNetworkRank = $network;
                }
                if ($network < $maxNetworkRank) {
                    $highestARoad = $roadsPerCity[$a][1];
                    break 1;
                }
                $maximumNetworks[] = [$roadsPerCity[$a][0], $roadsPerCity[$b][0]];
            }
        }

        $networkCount = count($maximumNetworks);
        for ($i = 0; $i < $networkCount; $i++) {
            if (!in_array([$maximumNetworks[$i][0], $maximumNetworks[$i][1]], $roads) && !in_array([$maximumNetworks[$i][1], $maximumNetworks[$i][0]], $roads)) {
                // if any cities are unconnected they have the highest network rank
                return $maxNetworkRank;
            }
        }

        return $maxNetworkRank - 1;
    }
}
