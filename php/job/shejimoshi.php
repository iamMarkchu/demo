<?php
/**
 * php设计模式
 */

/**
 * 单例模式
 */

class db
{
    private static $_instance;

    private function __construct()
    {
        echo '我被实例化了' . PHP_EOL;
    }

    public static function get_instance()
    {
        if(!isset(self::$_instance))
            self::$_instance = new self();
        return self::$_instance;
    }

    private function __clone()
    {
        trigger_error('Clone is not allow' ,E_USER_ERROR);
    }

    public function test()
    {
        echo '123';
    }
}
// $a = new db();
$a = db::get_instance();
echo $a->test();