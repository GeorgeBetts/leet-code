<?php

require_once "Solution.php";

$solution = new Solution();
$result = $solution->fullJustify(["Science", "is", "what", "we", "understand", "well", "enough", "to", "explain", "to", "a", "computer.", "Art", "is", "everything", "else", "we", "do"], 20);
print_r($result);
