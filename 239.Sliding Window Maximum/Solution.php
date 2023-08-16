<?php

/**
 * Solution to problem 239 Sliding Window Maximum
 *
 * You are given an array of integers nums, there is a sliding window of size k which is
 * moving from the very left of the array to the very right. You can only see the k numbers in the window.
 * Each time the sliding window moves right by one position.
 * Return the max sliding window.
 */
class Solution
{
    /**
     * @param int[] $nums
     * @param int $k
     * @return int[]
     */
    public function maxSlidingWindow($nums, $k)
    {
        $count = count($nums);
        $windowQueue = new SplQueue();
        $result = [];
        for ($i = 0; $i <= $count - 1; $i++) {
            $completeWindow = $i >= $k - 1;
            // remove bottom from the start of the queue if it's no longer in the window
            if ($completeWindow && !$windowQueue->isEmpty() && $windowQueue->bottom() <= $i - $k) {
                $windowQueue->shift();
            }
            // remove numbers from the queue which are not greater than the new number being added
            while (!$windowQueue->isEmpty() && $nums[$i] >= $nums[$windowQueue->top()]) {
                $windowQueue->pop();
            }
            // add to the end of the queue
            $windowQueue->push($i);

            if ($completeWindow) {
                $result[] = $nums[$windowQueue->bottom()];
            }
        }

        return $result;
    }
}
