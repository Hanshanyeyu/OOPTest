<?php
namespace pj\DesignPattern;

use pj\DesignPattern\Obverserable;
use pj\DesignPattern\Factory;

include_once 'Observerable.php';
include_once 'Factory.php';


class Adapter implements Observerable
{
    private $single;

    public function __construct()
    {
        $this->single = Factory::createSingle();
    }

    public function update()
    {
        $this->single->update();
    }

    public function extra()
    {
        // TODO: Implement extra() method.
    }
}