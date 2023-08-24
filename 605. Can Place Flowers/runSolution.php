<?php

require_once "Solution.php";

$solution = new Solution();
$result = $solution->canPlaceFlowers([0, 0, 1, 0, 1], 1);
print_r($result);
