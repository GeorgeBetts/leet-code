<?php

class Vertex
{
    public $val = null;
    public $adjacent = [];

    public function __construct(?string $val = null)
    {
        $this->val = $val;
    }

    public function addAdjacentVertex(Vertex $vertex)
    {
        $this->adjacent[] = $vertex;
    }
}

/**
 * Find the shortest path (no. of nodes) between the start and end node
 *
 * @param Vertex $start
 * @param Vertex $end
 * @return void
 */
function shortestPath(Vertex $start, Vertex $end)
{
    $visited = [];
    $currentVertex = $start;
    $queue = new SplQueue();

    // add starting node to the queue
    $queue->enqueue($currentVertex);
    $previousVertices[$currentVertex->val] = [];

    while ($queue->count() > 0) {
        $currentVertex = $queue->dequeue();
        // with breadth first search, the first found path is the shortest
        if ($currentVertex->val == $end->val) {
            // shortest path has been found, use previousVertices to work out the path
            $path = [$currentVertex->val];
            $traversalVertex = $previousVertices[$currentVertex->val];
            while (count($traversalVertex) > 0) {
                $path[] = $traversalVertex[0];
                $traversalVertex = $previousVertices[$traversalVertex[0]];
            }
            return array_reverse($path);
        }
        $visited[$currentVertex->val] = true;
        foreach ($currentVertex->adjacent as $adjacentVertex) {
            if (isset($visited[$adjacentVertex->val])) {
                continue;
            } else {
                $previousVertices[$adjacentVertex->val][] = $currentVertex->val;
                $queue->enqueue($adjacentVertex);
            }
        }
    }
}

// define the nodes
$idris = new Vertex("Idris");
$kamil = new Vertex("Kamil");
$talia = new Vertex("Talia");
$lina = new Vertex("Lina");
$ken = new Vertex("Ken");
$marco = new Vertex("Marco");
$sasha = new Vertex("Sasha");

// create the node connections
$idris->addAdjacentVertex($kamil);
$idris->addAdjacentVertex($talia);
$kamil->addAdjacentVertex($lina);
$talia->addAdjacentVertex($ken);
$ken->addAdjacentVertex($marco);
$marco->addAdjacentVertex($sasha);
$sasha->addAdjacentVertex($lina);

print_r(shortestPath($sasha, $idris));
