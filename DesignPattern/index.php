<?php
include_once 'Adapter.php';
include_once 'Register.php';
include_once 'Observer.php';
use \pj\DesignPattern\Adapter;
use \pj\DesignPattern\Observer;
use \pj\DesignPattern\Register;

$ada = new Adapter();
Register::setTree('ab1', $ada);
$observer = new Observer();
$observer->addOb(Register::getTree('ab1'));
$observer->change();