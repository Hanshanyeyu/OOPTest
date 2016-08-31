<?php
namespace pj\Sort;

include_once 'Sort.php';
include_once 'FatherClass.php';

use pj\Sort\Sort;
use pj\Sort\FatherClass;

class SelectionSort extends FatherClass implements Sort
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
            $smallest = $first;
            $largest = $first;
            //找出未排序部分最大、最小数的索引
            for ($index = $first + 1; $index <= $last; $index++) {
                if ($this->sortedArray[$index] < $this->sortedArray[$smallest]) {
                    $smallest = $index;
                }
                if ($this->sortedArray[$index] > $this->sortedArray[$largest]) {
                    $largest = $index;
                }
            }

            //将混乱部分最大最小数放在两边
            $temp = $this->sortedArray[$smallest];
            $this->sortedArray[$smallest] = $this->sortedArray[$first];
            $this->sortedArray[$first] = $temp;
            //如果最大数被换走了，需要改变最大数的下标
            if ($largest == $first) {
                $largest = $smallest;
            }
            $temp = $this->sortedArray[$largest];
            $this->sortedArray[$largest] = $this->sortedArray[$last];
            $this->sortedArray[$last] = $temp;
            //缩小范围
            $first++;
            $last--;
        }
    }
}