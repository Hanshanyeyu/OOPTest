<?php
namespace pj\DesignPattern;

include_once 'Register.php';
use pj\DesignPattern\Register;

class Observer
{
    private $ob = array();

    public function addOb($object)
    {
        $this->ob[] = $object;
    }

    public function change()
    {
        if (count($this->ob) !== 0) {
            foreach ($this->ob as $object) {
                if ($object instanceof Observerable) {
                    $object->update();
                }
            }
        }
    }
}