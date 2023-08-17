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
        $result = $mat;
        $rowCount = count($mat);
        $colCount = count($mat[0]);
        for ($row = 0; $row <= $rowCount - 1; $row++) {
            for ($col = 0; $col <= $colCount - 1; $col++) {
                $zeroFound = false;
                $stepCount = 0;
                while ($zeroFound == false) {
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
                $result[$row][$col] = $stepCount;
            }
        }
        return $result;
    }
}
