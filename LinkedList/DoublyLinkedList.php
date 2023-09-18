<?php

require_once("ListNode.php");

/**
 * Provides methods for managing nodes in a doubly linked list
 */
class DoublyLinkedList
{
    public $bottom = null;
    public $top = null;

    /**
     * Constructor
     *
     * @param ListNode $bottom Bottom node of the list
     */
    public function __construct($bottom = null)
    {
        $this->bottom = $bottom;
        $currentNode = $this->bottom;
        while ($currentNode->next !== null) {
            $currentNode = $currentNode->next;
        }
        $this->top = $currentNode;
    }

    /**
     * Appends a new node onto a linked list at the end of the list
     *
     * @param integer $val
     * @return ListNode
     */
    public function push($val = 0)
    {
        $newNode = new ListNode($val);
        if (!$this->bottom) {
            $this->bottom = $newNode;

            return;
        }

        $current = $this->bottom;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = $newNode;

        return;
    }

    /**
     * Prints all values in the list
     *
     * @return void
     */
    public function printValues(): void
    {
        $currentNode = $this->bottom;
        while ($currentNode) {
            print_r($currentNode->val);
            $currentNode = $currentNode->next;
        }
        return;
    }

    /**
     * Prints all values in the list in reverse order (top to bottom)
     *
     * @return void
     */
    public function printValuesReverse(): void
    {
        $currentNode = $this->top;
        while ($currentNode) {
            print_r($currentNode->val);
            $currentNode = $currentNode->previous;
        }
        return;
    }
}
