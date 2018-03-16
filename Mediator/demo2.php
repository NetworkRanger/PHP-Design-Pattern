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

$student = new Student('suse');
echo $student->buy();

echo '<br />';

$teacher = new Teacher('tom');
echo $teacher->buy();











