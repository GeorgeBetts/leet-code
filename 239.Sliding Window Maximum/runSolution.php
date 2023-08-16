<?php

require_once "Solution.php";

$solution = new Solution();
$result = $solution->maxSlidingWindow([1, -9, 8, -6, 6, 4, 0, 5], 4);
print_r($result);
