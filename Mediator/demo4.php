<?php
header('Content-Type:text/html; charset=utf-8');

abstract class Buyer{
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    abstract public function buy(Landlord $landlord);
}

class Student extends Buyer{
    public function buy(Landlord $landlord){
        return '学生'.$this->name.'买了房东'.$landlord->getName()
            .'的'.$landlord->getAddress().'一套房！';
    }
}

class Teacher extends Buyer{
    public function buy(Landlord $landlord){
        return '老师'.$this->name.'买了房东'.$landlord->getName()
        .'的'.$landlord->getAddress().'一套房！';
    }
}

class Landlord{
    private $name;
    private $address;

    public function __construct($name, $address){
        $this->name = $name;
        $this->address = $address;
    }

    public function getName(){
        return $this->name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function sell(Buyer $buyer){
        return $this->name.'在'.$this->address.'卖掉了一套房！购房者：'.$buyer->getName();
    }
}


$student = new Student('suse');
$landlord = new Landlord('包租婆', '功夫村');
echo $student->buy($landlord);

echo '<br />';

echo $landlord->sell($student);














