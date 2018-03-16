<?php
header('Content-Type:text/html; charset=utf-8');

abstract class Buyer{
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }

    abstract public function buy();
}

class Student extends Buyer{
    public function buy(){
        return '学生'.$this->name.'买了一套房！';
    }
}

class Teacher extends Buyer{
    public function buy(){
        return '老师'.$this->name.'买了一套房！';
    }
}

class Landlord{
    private $name;
    private $address;

    public function __construct($name, $address){
        $this->name = $name;
        $this->address = $address;
    }

    public function sell(){
        return $this->name.'在'.$this->address.'卖掉了一套房！';
    }
}

$student = new Student('suse');
echo $student->buy();

echo '<br />';

$landlord = new Landlord('包租婆', '功夫村');
echo $landlord->sell();











