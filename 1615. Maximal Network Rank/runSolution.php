<?php

require_once("Solution.php");

$solution = new Solution();
print_r($solution->maximalNetworkRank(2, [[1, 0]]));
