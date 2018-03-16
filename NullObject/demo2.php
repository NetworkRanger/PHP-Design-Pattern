<?php
header('Content-Type:text/html; charset=utf-8');

class User{
    public function getInfo(){
        return '信息';
    }
}

class Factory{
    static public function getUser(){
        //$obj = new User(); // new User()是直接写的，如果复杂的逻辑可能不是直接写
        $obj = null;
        if(!$obj) $obj = new Null();
        return $obj;
    }
}

class Null extends User{
    public function getInfo(){}
}

$user = Factory::getUser();
echo $user->getInfo();
