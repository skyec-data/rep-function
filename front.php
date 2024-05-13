<?php

/**
 * UniqueNestedLinkedList - A unique implementation of a nested linked list
 * Developed by Skye C
 */
class Node {
    public $data;
    public $next;
    public $child;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->child = null;
    }
}

/**
 * UniqueNestedLinkedList - A unique implementation of a nested linked list
 * Developed by Skye C
 */
class UniqueNestedLinkedList {
    public $head;

    public function __construct() {
        $this->head = null;
    }

    public function add($data) {
        $newNode = new Node($data);
        if (!$this->head) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    public function addChild($parentData, $childData) {
        $parent = $this->findNode($parentData);
        if ($parent) {
            $newChild = new Node($childData);
            if (!$parent->child) {
                $parent->child = $newChild;
            } else {
                $current = $parent->child;
                while ($current->next) {
                    $current = $current->next;
                }
                $current->next = $newChild;
            }
        } else {
            echo "Parent node not found.";
        }
    }

    private function findNode($data) {
        $current = $this->head;
        while ($current) {
            if ($current->data === $data) {
                return $current;
            }
            $current = $current->next;
        }
        return null;
    }
}

// Example usage
$uniqueList = new UniqueNestedLinkedList();
$uniqueList->add("Alpha");
$uniqueList->add("Beta");
$uniqueList->addChild("Alpha", "Child of Alpha");
$uniqueList->addChild("Beta", "Child of Beta");
