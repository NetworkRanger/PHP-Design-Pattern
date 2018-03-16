<?php
header('Content-Type:text/html; charset=utf-8');

class Lesson{
    // 课程购买人数
    private $num;
    // 策略属性字段，保存具体策略角色对象的引用，例如English对象或者Math对象
    private $_strategy;

    public function __get($key){
        return $this->$key;
    }

    // 构造方法初始化
    public function __construct($num,$_strategy){
        $this->num = $num;
        $this->_strategy = $_strategy;
    }

    // 返回具体策略角色课程所需的费用
    public function cost(){
        return $this->_strategy->cost($this);
    }

    // 返回具体策略角色购买的课程
    public function type(){
        return $this->_strategy->type();
    }
}

abstract class L{
    abstract public function cost(Lesson $lesson);
    abstract public function type();
}

class English extends L{
    public function cost(Lesson $lesson){
        return 300 * $lesson->num;
    }

    public function type(){
        return '您购买的是英文课';
    }
}

class Math  extends L{
    public function cost(Lesson $lesson){
        return 180 * $lesson->num;
    }

    public function type(){
        return '您购买的是数学课';
    }
}

$lesson = new Lesson(5, new English()); // 通过不同的参数，来改变不同的课程的行为，这种方法实现了类切换就是多态。
echo $lesson->type().$lesson->cost();

echo '<br />';

$lesson = new Lesson(2, new Math());
echo $lesson->type().$lesson->cost();























