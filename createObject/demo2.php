<?php
header('Content-Type:text/html; charset=utf-8');

abstract class Person{
    protected $name;
    public function __construct($name){
        $this->name = $name;
    }
    abstract public function doing();
}

class Student extends Person{
    public function doing(){
        return '学生'.$this->name.'在学习！';
    }
}

class Teacher extends Person{
    public function doing(){
        return '老师'.$this->name.'在讲课！';
    }
}

class Lead{
    private $person;

    public function addPerson(Person $person){
        $this->person = $person;
    }

    public function doing(){
        return $this->person->doing();
    }
}

$person = new Lead();
$person->addPerson(new Student('小胡'));
echo $person->doing();












