<?php

require_once("LinkedList.php");

/**
 * Solution to Puzzle 86 - Partion a linked list
 */
class Solution
{
    /**
     * @param ListNode $head
     * @param Integer $x
     * @return ListNode
     */
    public function partition($head, $x)
    {
        if (!$head) {
            return $head;
        }
        $listBeforeX = new LinkedList();
        $listIncAndAfterX = new LinkedList();
        $current = $head;
        while ($current !== null) {
            if ($current->val < $x) {
                $listBeforeX->addToEnd($current->val);
            } else {
                $listIncAndAfterX->addToEnd($current->val);
            }
            $current = $current->next;
        }

        if ($listBeforeX->head == null) {
            return $listIncAndAfterX->head;
        }

        // find the end node of the first list
        $currentBeforeX = $listBeforeX->head;
        while ($currentBeforeX->next !== null) {
            $currentBeforeX = $currentBeforeX->next;
        }

        // merge the two lists
        $currentBeforeX->next = $listIncAndAfterX->head;

        return $listBeforeX->head;
    }
}
