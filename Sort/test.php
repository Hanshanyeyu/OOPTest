<?php
namespace Pj\Sort;
include_once 'HeapSort.php';
include_once 'InsertionSort.php';
include_once 'MergeSort.php';
include_once 'QuickSort.php';
include_once 'SelectionSort.php';

class Test
{
    private $prefix;
    private $className = array();
    private $origin = array();
    private $sorted = array();
    private $count = 0;

    public function __construct($prefix, $className)
    {
        $this->prefix = $prefix;
        if (is_array($className)) {
            $this->className = $className;
        } else {
            $this->className = [$className];
        }
        $this->origin = [
            [23, 56, 11, -6, 3, 88, 22, 56, 2, 8],
            [34, 67, -890, 435, 546, 78, 234, 87432, 125, 634],
            [23, 54, 76, 897, 234, -2534, 432, 87, 65, 346]
        ];
        $this->sorted = [
            [-6, 2, 3, 8, 11, 22, 23, 56, 56, 88],
            [-890, 34, 67, 78, 125, 234, 435, 546, 634, 87432],
            [-2534, 23, 54, 65, 76, 87, 234, 346, 432, 897]
        ];
        $this->count = 3;
    }

    public function addTest(array $origin, array $sorted)
    {
        if (count($origin) === count($sorted)) {
            $this->origin[] = $origin;
            $this->sorted[] = $sorted;
            $this->count++;
        } else {
            echo "<script>alert('原数组或排序好的数组错误');</script>";
        }
    }

    public function testing()
    {
        for ($i = 0; $i < $this->count; $i++) {
            echo '对于数列';
            var_dump($this->origin[$i]);
            echo '<br/>';
            echo '正确顺序';
            var_dump($this->sorted[$i]);
            echo '<br/>';
            $success = 0;
            $fail = 0;
            foreach ($this->className as $class) {
                echo $class . '排列的结果为: <br/>';
                $class = $this->prefix . $class;
                $temp = new $class($this->origin[$i]);
                $temp->sort();
                if ($temp->getSortedArray() === $this->sorted[$i]) {
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
    }
}