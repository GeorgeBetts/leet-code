<?php

include("Solution.php");
$solution = new Solution();

$result = $solution->getConcatenation([1, 2, 1]);
print_r($result);
