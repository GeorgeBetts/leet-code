<?php

/**
 * Solution for 2215. Find the Difference of Two Arrays
 *
 */
class Solution
{

    /**
     * @param Int[] $nums1
     * @param Int[] $nums2
     * @return Int[][]
     */
    public function findDifference($nums1, $nums2)
    {
        $result = [[], []];
        $occurences = [];
        $count = count($nums1);
        // save each value in $nums1 into $occurences using the value as the array key
        // value of 1 indicates it's in $nums1
        for ($i = 0; $i < $count; $i++) {
            $occurences[$nums1[$i]] = 1;
        }
        // look through $nums 2 and identify nums that also existed in $nums1 by checking the key of $occurences
        $count = count($nums2);
        for ($i = 0; $i < $count; $i++) {
            // if the num is already in $occurences set the value to 3 to indicate it's in
            // both $nums1 and $nums2 (also the occurence to ensure it's not only in $nums2)
            if (isset($occurences[$nums2[$i]]) && $occurences[$nums2[$i]] != 2) {
                $occurences[$nums2[$i]] = 3;
            } else {
                // the num isn't in $nums1, therefore it's only in $nums2, so set it's value to 2
                $occurences[$nums2[$i]] = 2;
            }
        }
        // create the results array using $occurences values
        // 1 indicates the key is a value only in $nums1
        // 2 indicates the key is a value only in $nums2
        // 3 indicates the key is a value in both $nums1 and $nums2 and can therefore be ignored
        foreach ($occurences as $key => $value) {
            if ($value == 1) {
                $result[0][] = $key;
            } elseif ($value == 2) {
                $result[1][] = $key;
            }
        }
        return $result;
    }
}
