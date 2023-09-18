<?php

/**
 * Definition for a singly-linked list.
 */
class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}


/**
 * Solution for 206. Reverse Linked List
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function reverseList($head)
    {
        $prevNode = null;
        while ($head !== null) {
            $nextNode = $head->next;
            $head->next = $prevNode;
            $prevNode = $head;
            $head = $nextNode;
        }
        return $prevNode;
    }
}
