<?php
namespace pj\Sort;

include_once 'Sort.php';
include_once 'FatherClass.php';

use pj\Sort\Sort;
use pj\Sort\FatherClass;

class QuickSort extends FatherClass implements Sort
{
    private $start;
    private $end;

    public function __construct(array $parameter)
    {
        parent::__construct($parameter);
        $this->sortedArray = $this->originArray;
        $this->start = 0;
        $this->end = count($this->sortedArray) - 1;
    }

    public function sort()
    {
        $left = $this->start;
        $right = $this->end;
        $base = $left;
        $last = $right;
        while ($left < $right) {
            while ($this->sortedArray[$base] <= $this->sortedArray[$right] && $left < $right) {
                $right--;
            }
            while ($this->sortedArray[$base] >= $this->sortedArray[$left] && $left < $right) {
                $left++;
            }
            $temp = $this->sortedArray [$right];
            $this->sortedArray [$right] = $this->sortedArray [$left];
            $this->sortedArray [$left] = $temp;
        }
        $temp = $this->sortedArray [$base];
        $this->sortedArray [$base] = $this->sortedArray [$left];
        $this->sortedArray [$left] = $temp;
        if ($left > $base) {
            $this->start = $base;
            $this->end = $left - 1;
            $this->sort();
        }
        if ($last > $left) {
            $this->start = $left + 1;
            $this->end = $last;
            $this->sort();
        }
    }
}