<?php
namespace Pj\Sort;

include_once 'Sort.php';
include_once 'FatherClass.php';

use Pj\Sort\Sort;
use Pj\Sort\FatherClass;

class MergeSort extends FatherClass implements Sort
{
    private $first;
    private $last;

    public function __construct(array $parameter)
    {
        parent::__construct($parameter);
        $this->sortedArray = $this->originArray;
        $this->first = 0;
        $this->last = count($this->sortedArray) - 1;
    }

    public function sort()
    {
        $first = $this->first;
        $last = $this->last;
        $middle = floor(($first + $last) / 2);
        if ($last - $first > 3) {
            $this->first = $middle + 1;
            $this->last = $last;
            $this->sort();
            $this->first = $first;
            $this->last = $middle;
            $this->sort();
        } else {
            $this->mSort($last, $middle + 1);
            $this->mSort($middle, $first);
        }
        $temp = array();
        $index1 = $first;
        $index2 = $middle + 1;
        while ($index1 <= $middle && $index2 <= $last) {
            if ($this->sortedArray[$index1] < $this->sortedArray[$index2]) {
                $temp[] = $this->sortedArray[$index1];
                $index1++;
            } else {
                $temp[] = $this->sortedArray[$index2];
                $index2++;
            }
        }
        if ($index1 > $middle) {
            while ($index2 <= $last) {
                $temp[] = $this->sortedArray[$index2];
                $index2++;
            }
        } else {
            while ($index1 <= $middle) {
                $temp[] = $this->sortedArray[$index1];
                $index1++;
            }
        }
        for ($index1 = 0, $index2 = $first; $index1 < count($temp); $index1++, $index2++) {
            $this->sortedArray[$index2] = $temp[$index1];
        }
    }

    private function mSort($last, $first)
    {
        if ($last !== $first) {
            if ($this->sortedArray[$first] > $this->sortedArray[$last]) {
                $temp = $this->sortedArray[$first];
                $this->sortedArray[$first] = $this->sortedArray[$last];
                $this->sortedArray[$last] = $temp;
            }
        }
    }
}