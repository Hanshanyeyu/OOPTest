<?php
namespace pj\Sort;

class FatherClass
{
    protected $originArray = array();
    protected $sortedArray = array();

    public function __construct(array $parameter)
    {
        if (is_array($parameter)) {
            $this->originArray = $parameter;
        } else {
            die('请传入一个数组！');
        }
    }

    public function getOriginArray()
    {
        return $this->originArray;
    }

    public function getSortedArray()
    {
        return $this->sortedArray;
    }
}