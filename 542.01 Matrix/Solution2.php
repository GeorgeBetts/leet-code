<?php

/**
 * Solution for puzzle 542 01 Matrix
 *
 * Given an m x n binary matrix mat, return the distance of the nearest 0 for each cell.
 */
class Solution
{

    /**
     * @param Integer[][] $mat
     * @return Integer[][]
     */
    public function updateMatrix($mat)
    {
        $result = [];

        // find all 0 occurences and note save the coordinates
        $zeros = [];
        $rowCount = count($mat);
        $colCount = count($mat[0]);
        for ($row = 0; $row <= $rowCount - 1; $row++) {
            for ($col = 0; $col <= $colCount - 1; $col++) {
                $result[$row][$col] = null;
                if ($mat[$row][$col] === 0) {
                    $zeros[] = [$row, $col];
                    $result[$row][$col] = 0;
                }
            }
        }

        // check distance of each coordinate to the zeros
        $zeroCount = count($zeros);
        for ($row = 0; $row <= $rowCount - 1; $row++) {
            for ($col = 0; $col <= $colCount - 1; $col++) {
                if ($result[$row][$col] === null) {
                    // check small distances manually for efficiency
                    $zeroFound = false;
                    $stepCount = 1;
                    while ($zeroFound == false && $stepCount <= 3) {
                        for ($i = $stepCount; $i >= 0; $i--) {
                            $d = $stepCount - $i;
                            $zeroFound = (isset($mat[$row + $i][$col + $d]) && $mat[$row + $i][$col + $d] === 0)
                                || (isset($mat[$row - $i][$col + $d]) && $mat[$row - $i][$col + $d] === 0)
                                || (isset($mat[$row + $d][$col - $i]) && $mat[$row + $d][$col - $i] === 0)
                                || (isset($mat[$row - $d][$col - $i]) && $mat[$row - $d][$col - $i] === 0);
                            if ($zeroFound) {
                                break 2;
                            }
                        }
                        $stepCount++;
                    }
                    if ($zeroFound) {
                        $result[$row][$col] = $stepCount;
                    } else {
                        // not found within the 0 to 3 steps, search the rest
                        $minDistance = PHP_INT_MAX;
                        for ($i = 0; $i <= $zeroCount - 1; $i++) {
                            $distance = abs($zeros[$i][0] - $row) + abs($zeros[$i][1] - $col);
                            if ($distance < $minDistance) {
                                $minDistance = $distance;
                            }
                            if ($minDistance == 4) {
                                break;
                            }
                        }
                        $result[$row][$col] = $minDistance;
                    }
                }
            }
        }

        return $result;
    }
}
