<?php

require_once("ListNode.php");

/**
 * Provides methods for managing (adding and removing) nodes in a linked list
 */
class LinkedList
{
    public $head = null;

    /**
     * Constructor
     *
     * @param ListNode $head Head node of the list
     */
    public function __construct($head = null)
    {
        $this->head = $head;
    }

    /**
     * Returns the node at the top of the list
     *
     * @return ListNode|null
     */
    public function top(): ?ListNode
    {
        $currentNode = $this->head;
        while ($currentNode->next !== null) {
            $currentNode = $currentNode->next;
        }
        return $currentNode;
    }

    /**
     * Appends a new node onto a linked list at the end of the list
     *
     * @param integer $val
     * @return ListNode
     */
    public function addToEnd($val = 0)
    {
        $newNode = new ListNode($val);
        if (!$this->head) {
            $this->head = $newNode;

            return;
        }

        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = $newNode;

        return;
    }
}
