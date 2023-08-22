<?php

require_once "Solution.php";

$solution = new Solution();
$result = $solution->findMaxAverage([1, 12, -5, -6, 50, 3], 4);
print_r($result);
