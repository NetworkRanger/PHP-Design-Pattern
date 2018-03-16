<?php
header('Content-Type:text/html; charset=utf-8');

class Person{
    public function __construct(){
        // 这里初始化，把人进化成有知识有技能的人
    }
}

$arr = [1, 2, 3, 4, 5];
$obj = [];

foreach($arr as $value){
    $obj[] = new Person();
}

var_dump($obj);