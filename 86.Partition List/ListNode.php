<?php

/**
 * Definition for a singly-linked list.
 * Defined by LeetCode
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    /**
     * Constructor
     *
     * @param integer $val
     * @param [type] $next
     */
    public function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}
