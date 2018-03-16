<?php
header('Content-Type:text/html; charset=utf-8');

abstract class Lesson{
    protected $num;

    public function __construct($num){
        $this->num = $num;
    }

    abstract public function cost();
    abstract public function type();
}

class Math extends Lesson{
    public function cost(){
        return $this->num * 150;
    }
    public function type(){
        return '数学课!';
    }
}

class English extends Lesson{
    public function cost(){
        return $this->num * 100;
    }
    public function type(){
        return '英语课!';
    }
}

$english = new English(5);
echo $english->type().$english->cost();



















