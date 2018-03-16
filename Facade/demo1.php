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

echo getName();
echo '<br />';
echo readXml();
echo '<br />';
$person = new Person(1, 'suse');
echo $person->getInfo();























