<?php
header('Content-Type:text/html; charset=utf-8');

abstract class Lesson{
    //课程购买人数
    protected $num;

    //构造方法初始化
    public function __construct($num) {
        $this->num = $num;
    }

    //返回课程所需的费用
    abstract public function cost();

    //返回购买的课程
    abstract public function type();
}

abstract class Arts extends Lesson{
    protected $_discount = 0.85;
    protected $type = '文科';
}

abstract class Science extends Lesson{
    protected $_discount = 0.75;
    protected $type = '理科';
}


class EnglishArts extends Arts{
    public function cost(){
        return $this->_discount * 300 * $this->num;
    }

    public function type(){
        return '您购买的是'.$this->type.'英文课';
    }
}

class MathArts extends Arts{
    public function cost(){
        return $this->_discount * 180 * $this->num;
    }

    public function type(){
        return '您购买的是'.$this->type.'数学课';
    }
}

class EnglishScience extends Science{
    public function cost(){
        return $this->_discount * 300 * $this->num;
    }

    public function type(){
        return '您购买的是'.$this->type.'英文课';
    }
}

class MathScience extends Science{
    public function cost(){
        return $this->_discount * 180 * $this->num;
    }

    public function type(){
        return '您购买的是'.$this->type.'数学课';
    }
}

$lesson = new EnglishArts(5);
echo $lesson->type().$lesson->cost();

echo '<br />';

$lesson = new MathScience(5);
echo $lesson->type().$lesson->cost();















