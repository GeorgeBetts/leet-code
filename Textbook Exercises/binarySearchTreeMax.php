<?php

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}


function binarySearchTreeMax($node)
{
    $currentNode = $node;
    while ($currentNode->right) {
        $currentNode = $currentNode->right;
    }
    return $currentNode;
}

function binarySearchTreeSearch($node, $search)
{
    if ($search == $node->val) {
        return $node->val;
    } elseif ($search > $node->val) {
        return binarySearchTreeSearch($node->right, $search);
    } else {
        return binarySearchTreeSearch($node->left, $search);
    }
}

$node1 = new TreeNode(5);
$node2 = new TreeNode(9);
$node3 = new TreeNode(2);
$node4 = new TreeNode(1);
$node1->right = $node2;
$node1->left = $node3;
$node3->left = $node4;

print_r(binarySearchTreeMax($node1)->val);
