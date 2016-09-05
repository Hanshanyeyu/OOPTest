<?php
namespace Pj\Sort;

include_once 'Test.php';
use Pj\Sort\Test;

$class = ['HeapSort', 'InsertionSort', 'MergeSort', 'QuickSort', 'SelectionSort'];
$prefix = 'Pj\Sort\\';
$origin = [12, 47, 6, 8];
$sorted = [6, 8, 12, 47];
$test = new Test($prefix, $class);
$test->addTest($origin, $sorted);
$test->testing();