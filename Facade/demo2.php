<?php
header('Content-Type:text/html; charset=utf-8');

function getName(){
    return 'My name is suse';
}

function readXml(){
    return '正在读取XML';
}

class Person{
    private $id;
    private $name;

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function getInfo(){
        return $this->id.'---'.$this->name;
    }
}

// 外观类
class Facade{
    public function getName(){
        return getName();
    }

    public function getReadXml(){
        return readXml();
    }

    public function getPersonInfo($id, $name){
        $person = new Person($id, $name);
        return $person->getInfo();
    }
}

$facade = new Facade();
echo $facade->getName();
echo '<br />';
echo $facade->getReadXml();
echo '<br />';
echo $facade->getPersonInfo(1, 'suse');






















