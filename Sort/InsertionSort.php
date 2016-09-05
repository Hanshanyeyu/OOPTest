<?php
namespace Pj\Sort;

include_once 'Sort.php';
include_once 'FatherClass.php';

use Pj\Sort\Sort;
use Pj\Sort\FatherClass;

class InsertionSort extends FatherClass implements Sort
{
    public function __construct(array $parameter)
    {
        parent::__construct($parameter);
    }

    public function sort()
    {
        $this->sortedArray = $this->originArray;
        $start = 0;
        $index = 1;
        $end = count($this->sortedArray) - 1;
        while ($end >= $index) {
            $basic = $this->sortedArray[$index];
            $position = $this->dichotomySearch($index - 1, $start, $basic);
            $temp = $this->sortedArray[$index];
            for ($i = $index; $i > $position; $i--) {
                $this->sortedArray[$i] = $this->sortedArray[$i - 1];
            }
            $this->sortedArray[$position] = $temp;
            $index++;
        }
    }

    private function dichotomySearch($end, $start, $basic)
    {
        if ($end - $start > 1) {
            $middle = floor(($end + $start) / 2);
            if ($this->sortedArray[$middle] >= $basic) {
                return $this->dichotomySearch($middle, $start, $basic);
            } else {
                return $this->dichotomySearch($end, $middle + 1, $basic);
            }
        } elseif ($basic < $this->sortedArray[$start]) {
            return $start;
        } elseif ($basic < $this->sortedArray[$end]) {
            return $end;
        } else {
            return $end + 1;
        }
    }
}