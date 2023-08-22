<?php

require_once "Solution.php";

$solution = new Solution();
$result = $solution->findDifference([1, 2, 3, 3], [1, 1, 2, 2]);
print_r($result);
