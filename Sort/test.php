<?php

namespace pj\Sort;

include_once 'HeapSort.php';
include_once 'InsertionSort.php';
include_once 'MergeSort.php';
include_once 'QuickSort.php';
include_once 'SelectionSort.php';

use \pj\Sort\HeapSort;
use \pj\Sort\InsertionSort;
use \pj\Sort\MergeSort;
use \pj\Sort\QuickSort;
use \pj\Sort\SelectionSort;

$class = ['HeapSort', 'InsertionSort', 'MergeSort', 'QuickSort', 'SelectionSort'];
$origin = [
    [23, 56, 11, -6, 3, 88, 22, 56, 2, 8],
    [34, 67, -890, 435, 546, 78, 234, 87432, 125, 634],
    [23, 54, 76, 897, 234, -2534, 432, 87, 65, 346]
];
$sorted = [
    [-6, 2, 3, 8, 11, 22, 23, 56, 56, 88],
    [-890, 34, 67, 78, 125, 234, 435, 546, 634, 87432],
    [-2534, 23, 54, 65, 76, 87, 234, 346, 432, 897]
];
$var = '\pj\Sort';
for ($i = 0; $i < 3; $i++) {
    echo '对于数列';
    var_dump($origin[$i]);
    echo '<br/>';
    echo '正确顺序';
    var_dump($sorted[$i]);
    echo '<br/>';
    $success = 0;
    $fail = 0;
    foreach ($class as $clas) {
        echo $clas . '排列的结果为: <br/>';
        $clas = $var . '\\' . $clas;
        $temp = new $clas($origin[$i]);
        $temp->sort();
        if ($temp->getSortedArray() === $sorted[$i]) {
            echo '<font style="color:green">成功</font>';
            $success++;
        } else {
            echo '<font style="color:red">失败</font>';
            $fail++;
        }
        echo '<br/>';
    }
    echo "排列共成功 $success 次，失败 $fail 次<br/>";
}