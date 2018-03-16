<?php
header('Content-Type:text/html; charset=utf-8');

//课程类
abstract class Lesson {
    //课程购买人数
    private $num;
    //策略属性字段，保存具体策略角色对象的引用，例如English对象或者Math对象
    private $_strategy;

    //构造方法初始化
    public function __construct($num, $_strategy) {
        $this->num = $num;
        $this->_strategy = $_strategy;
    }

    //拦截器
    public function __get($key) {
        return $this->$key;
    }

    //返回具体策略角色课程所需的费用
    public function cost() {							//$this表示Lesson类，传递给English
        return $this->_strategy->cost($this); //$this->_strategy保存了English对象(new English())
    }

    //返回具体策略角色购买的课程
    public function type() {
        return $this->_strategy->type($this);
    }

}

class Arts extends Lesson {
    protected $_discount = 0.85;		//父类对象访问子类属性
    protected $type = '文科';
}

class Science extends Lesson {
    protected $_discount = 0.75;
    protected $type = '理科';
}


abstract class L {
    abstract public function cost(Lesson $lesson);
    abstract public function type(Lesson $lesson);
}

class English extends L {
    public function cost(Lesson $lesson) {  //父类对象访问子类属性
        return $lesson->_discount * 300 * $lesson->num;
    }
    public function type(Lesson $lesson) {
        return '您购买的是'.$lesson->type.'英语课程！';
    }
}

class Math extends L {
    public function cost(Lesson $lesson) {
        return $lesson->_discount * 180 * $lesson->num;
    }
    public function type(Lesson $lesson) {
        return '您购买的是'.$lesson->type.'数学课程！';
    }
}

$lesson = new Arts(5,new English());
echo $lesson->type().$lesson->cost();

echo '<br />';

$lesson = new Science(2,new Math());
echo $lesson->type().$lesson->cost();


































