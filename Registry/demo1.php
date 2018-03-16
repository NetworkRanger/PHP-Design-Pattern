<?php
class Registry{
    static private $arr;

    static public function set($key, $object){
        self::$arr[$key] = $object;
    }

    static public function _unset($key){
        unset(self::$arr[$key]);
    }

    static public function get($key){
        return self::$arr[$key];
    }
}

class DB{}

$db = new DB();
Registry::set('db', $db);

$db = Registry::get('db');