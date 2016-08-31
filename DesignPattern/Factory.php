<?php
namespace pj\DesignPattern;

include_once 'Single.php';
use pj\DesignPattern\Single;

class Factory
{
    public static function createSingle()
    {
        return Single::newSingle();
    }
}
