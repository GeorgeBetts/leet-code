<?php

/**
 * Trie Node
 */
class TrieNode
{
    public $children = [];
    public function __construct(array $children = [])
    {
        $this->children = $children;
    }
}

/**
 * Trie Class
 */
class Trie
{
    public $root = null;

    public function __construct(TrieNode $root)
    {
        $this->root = $root;
    }

    /**
     * Traverses through the Trie and prints each key
     *
     * @return void
     */
    public function traverse($node = null): void
    {
        if ($node == null) {
            $node = $this->root;
        }
        foreach ($node->children as $key => $val) {
            print_r($key);
            if ($val !== null) {
                $this->traverse($val);
            }
        }
        return;
    }

    /**
     * Autocorrects the users input
     *
     * @param string $search
     * @return string
     */
    public function autocorrect(string $search): string
    {
        $searchChars = str_split($search);
        $currentNode = $this->root;
        $word = "";
        for ($i = 0; $i < count($searchChars); $i++) {
            if (isset($currentNode->children[$searchChars[$i]])) {
                $word .= $searchChars[$i];
                $currentNode = $currentNode->children[$searchChars[$i]];
            } else {
                return $this->traverseWord($currentNode, $word);
            }
        }
        return $word;
    }

    /**
     * Traverses the trie from the given node and concats
     * to the given word until the first end of a word
     *
     * @param TrieNode $node
     * @param string $word
     * @return void
     */
    public function traverseWord(TrieNode $node, string $word)
    {
        foreach ($node->children as $key => $val) {
            if ($key == "*") {
                return $word;
            }
            $word .= $key;
            if ($val !== null) {
                return $this->traverseWord($val, $word);
            }
        }
    }
}

$trie = new Trie(
    new TrieNode([
        "a" => new TrieNode([
            "c" => new TrieNode([
                "e" => new TrieNode([
                    "*" => null
                ])
            ])
        ]),
        "b" => new TrieNode([
            "a" => new TrieNode([
                "d"  => new TrieNode([
                    "*" => null
                ])
            ])
        ]),
        "c" => new TrieNode([
            "a" => new TrieNode([
                "t" => new TrieNode([
                    "s" => new TrieNode([
                        "*" => null
                    ])
                ]),
                "b" => new TrieNode([
                    "*" => null
                ])
            ])
        ])
    ])
);

print_r($trie->autocorrect("cac"));
