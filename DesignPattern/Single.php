<?php
namespace pj\DesignPattern;

class Single
{
    public static $single;

    private function __construct()
    {

    }

    public static function newSingle()
    {
        if (!(self::$single instanceof Single)) {
            self::$single = new Single;
        }
        return self::$single;
    }

    public function update()
    {
        echo '
        我是单例模式，可以通过Factory实例化对象，
        因为我没有extra()函数,无法实例化Observerable接口，
        只能通过Adapter，将Adapter实例放在Register的注册树属性数组中，
        将注册树的属性添加到Observer的观察者数组中，当Observer执行change()函数时，
        通过执行Adapter的update()函数，来执行我的update()函数
        ';
    }
}