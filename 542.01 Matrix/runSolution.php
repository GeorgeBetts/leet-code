<?php

require_once("Solution2.php");

$solution = new Solution();
$result = $solution->updateMatrix(
    [[0, 0, 0], [0, 1, 0], [0, 0, 0]]
);
print_r($result);
