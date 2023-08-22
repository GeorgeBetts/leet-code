<?php

/**
 * Solution for 168. Excel Sheet Column Title
 * Given an integer columnNumber, return its corresponding column title as it appears in an Excel sheet.
 */
class Solution
{

    /**
     * @param Int $columnNumber
     * @return String
     */
    public function convertToTitle($columnNumber)
    {
        $alphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
        $result = "";
        while ($columnNumber > 0) {
            $columnNumber--;
            $result = $alphabet[$columnNumber % 26] . $result;
            $columnNumber = intval($columnNumber / 26);
        }
        return $result;
    }
}
