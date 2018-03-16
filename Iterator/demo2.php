<?php
header('Content-Type:text/html; charset=utf-8');

class ArrayI{
    private $array;
    private $index = 0;
    private $length;

    public function __construct($array){
        $this->array = $array;
        $this->length = sizeof($array) - 1;
    }

    // 得到数组
    public function getArray(){
        return $this->array;
    }

    // 得到当前下标元素
    public function getContent(){
        return $this->array[$this->index];
    }

    // 得到最后一个元素
    public function getLastContent(){
        return $this->array[$this->length];
    }

    // 移位下一条
    public function next(){
        ++$this->index;
    }
}

$array = ['A', 'B', 'C', 'D', 'E'];

$array_iterator = new ArrayI($array);

foreach($array_iterator->getArray() as $key => $value){
    echo $key.'--'.$value.'<br />';
}

echo $array_iterator->getContent();
echo $array_iterator->getContent();
$array_iterator->next();
echo $array_iterator->getContent();
echo $array_iterator->getLastContent();




























