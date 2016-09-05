<?php
namespace Pj\Sort;

include_once 'Sort.php';
include_once 'FatherClass.php';

use Pj\Sort\Sort;
use Pj\Sort\FatherClass;

class HeapSort extends FatherClass implements Sort
{
    private $lastUnsort;

    public function __construct(array $parameter)
    {
        parent::__construct($parameter);
        $this->lastUnsort = count($this->originArray) - 1;
    }

    public function sort()
    {
        $this->sortedArray = $this->originArray;
        $first = 0;
        $index = floor(($this->lastUnsort + 1) / 2) - 1;
        while ($index >= $first) {
            $this->downAdjust($index);
            $index--;
        }
        while ($this->lastUnsort > 0) {
            $this->exchage($first, $this->lastUnsort);
            $this->lastUnsort--;
            $this->downAdjust(0);
        }
    }

    private function downAdjust($root)
    {
        $lagest = $root;
        while (1) {
            $lChild = ($root + 1) * 2 - 1;
            if ($lChild <= $this->lastUnsort) {
                if ($this->sortedArray[$lChild] > $this->sortedArray[$lagest]) {
                    $lagest = $lChild;
                }
            } else {
                break;
            }
            $rChild = $lChild + 1;
            if ($rChild <= $this->lastUnsort) {
                if ($this->sortedArray[$rChild] > $this->sortedArray[$lagest]) {
                    $lagest = $rChild;
                }
            }
            if ($lagest === $root) {
                break;
            } else {
                $this->exchage($root, $lagest);
                $root = $lagest;
            }
        }
    }

    private function exchage($one, $another)
    {
        $temp = $this->sortedArray[$one];
        $this->sortedArray[$one] = $this->sortedArray[$another];
        $this->sortedArray[$another] = $temp;
    }
}