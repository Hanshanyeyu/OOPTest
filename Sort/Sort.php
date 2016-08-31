<?php
namespace pj\Sort;
interface Sort
{
    public function sort();
    public function getOriginArray();
    public function getSortedArray();
}