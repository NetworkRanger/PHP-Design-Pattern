<?php
header('Content-Type:text/html; charset=utf-8');

interface IUserProxy{
    function getUserName($id);
    function setUserName($id, $name);
}

class Proxy implements IUserProxy{
    function getUserName($id){
        $db = Factory::getDatabase('slave');
        $db->query("select name from user where id =$id");
    }

    function setUserName($id, $name){
        $db = Factory::getDatabase('master');
        $db->query("update user set name = $name where id =$id");
    }
}

$proxy = new Proxy();
$info = $proxy->getUserName(1);
var_dump($info);
$proxy->setUserName(1, 'suse');

