<?php
header('Content-Type:text/html; charset=utf-8');

class Lesson{
    private $num;
    private $strategy;

    public function __get($key){
        return $this->$key;
    }

    public function __construct($num, $strategy){
        $this->num = $num;
        $this->strategy = $strategy;
    }

    public function cost(){
        return $this->strategy->cost($this);
    }
    public function type(){
        return $this->strategy->type();
    }
}

class Math{
    public function cost(Lesson $lesson){
        return $lesson->num * 150;
    }
    public function type(){
        return '数学课!';
    }
}

class English{
    public function cost(Lesson $lesson){
        return $lesson->num * 100;
    }
    public function type(){
        return '英语课!';
    }
}

$english = new Lesson(5, new English());
echo $english->type().$english->cost();


















