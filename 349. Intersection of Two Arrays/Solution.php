<?php

/**
 * Solution for 349. Intersection of Two Arrays
 *
 */
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    public function intersection($nums1, $nums2)
    {
        $nums1Count = count($nums1);
        $nums2Count = count($nums2);
        $intersections = [];
        $nums1Hash = [];
        for ($i = 0; $i < $nums1Count; $i++) {
            $nums1Hash[$nums1[$i]] = true;
        }
        for ($i = 0; $i < $nums2Count; $i++) {
            if (!empty($nums1Hash[$nums2[$i]])) {
                $intersections[$nums2[$i]] = true;
            }
        }
        $result = [];
        foreach ($intersections as $key => $v) {
            $result[] = $key;
        }

        return $result;
    }
}
