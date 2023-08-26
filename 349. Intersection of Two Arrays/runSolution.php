<?php

require_once "Solution.php";

$solution = new Solution();
$result = $solution->intersection([4, 9, 5], [9, 4, 9, 8, 4]);
print_r($result);
