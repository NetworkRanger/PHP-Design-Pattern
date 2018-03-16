<?php
header('Content-Type:text/html; charset=utf-8');

abstract class Buyer{
    protected $name;
    protected $mediator;

    public function __construct($name, $mediator){
        $this->name = $name;
        $this->mediator = $mediator;
    }

    public function getName(){
        return $this->name;
    }

    abstract public function buy();
}

class Student extends Buyer{
    public function buy(){
        return $this->mediator->buy();
    }
}

class Teacher extends Buyer{
    public function buy(){
        return $this->mediator->buy();
    }
}

class Landlord{
    private $name;
    private $address;
    private $mediator;

    public function __construct($name, $address, $mediator){
        $this->name = $name;
        $this->address = $address;
        $this->mediator = $mediator;
    }

    public function getName(){
        return $this->name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function sell(){
        return $this->mediator->sell();
    }
}

class Mediator{
    private $objs = [];

    public function addObj($obj){
        $this->objs[] = $obj;
    }

    public function buy(){
        foreach($this->objs as $obj){
            if($obj instanceof Buyer){
                if($obj instanceof Student) $tmp = '学生';
                if($obj instanceof Teacher) $tmp = '老师';
                $buyer = $obj;
            }
            if($obj instanceof Landlord){
                $landlord = $obj;
            }
        }
        return $tmp.$buyer->getName().'买了房东'.$landlord->getName()
            .'一套在'.$landlord->getAddress().'的房！';
    }

    public function sell(){
        foreach($this->objs as $obj){
            if($obj instanceof Buyer){
                if($obj instanceof Student) $tmp = '学生';
                if($obj instanceof Teacher) $tmp = '老师';
                $buyer = $obj;
            }
            if($obj instanceof Landlord){
                $landlord = $obj;
            }
        }
        return '房东'.$landlord->getName().'卖了一套'.$landlord->getAddress()
            .'房！购房者：'.$tmp.$buyer->getName();
    }
}

$mediator = new Mediator();
$student = new Student('suse', $mediator);
$landlord = new Landlord('包租婆', '功夫村', $mediator);
$mediator->addObj($student);
$mediator->addObj($landlord);

echo $student->buy();
echo '<br />';
echo $landlord->sell();














