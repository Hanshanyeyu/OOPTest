<?php
namespace pj\Sort;

include_once 'Sort.php';
include_once 'FatherClass.php';

use pj\Sort\Sort;
use pj\Sort\FatherClass;

class HeapSort extends FatherClass implements Sort
{
    public function __construct(array $parameter)
    {
        parent::__construct($parameter);
    }

    public function sort()
    {
        $this->sortedArray = $this->originArray;
        $first = 0;
        $last = count($this->sortedArray) - 1;
        while ($last > $first) {
            //末节点的父节点的下标
            $index = floor(($last + 1) / 2) - 1;
            while ($index >= $first) {
                $this->branchSort($index, $last);
                $index--;
            }
            $temp = $this->sortedArray[$first];
            $this->sortedArray[$first] = $this->sortedArray[$last];
            $this->sortedArray[$last] = $temp;
            $last--;
        }
    }

    private function branchSort($index, $last)
    {
        $largest = $index;
        //左、右子树的下标
        $lChild = ($index + 1) * 2 - 1;
        $rChild = $lChild + 1;
        if ($this->sortedArray[$lChild] > $this->sortedArray[$largest]) {
            $largest = $lChild;
        }
        //如果存在右子树
        if ($rChild <= $last) {
            if ($this->sortedArray[$rChild] > $this->sortedArray[$largest]) {
                $largest = $rChild;
            }
        }
        //如果不是父节点最大
        if ($largest !== $index) {
            $temp = $this->sortedArray[$index];
            $this->sortedArray[$index] = $this->sortedArray[$largest];
            $this->sortedArray[$largest] = $temp;
        }
    }
}