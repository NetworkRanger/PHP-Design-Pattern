<?php
header('Content-Type:text/html; charset=utf-8');

// 抽象课程类
abstract class Lesson{
    // 课程购买人数
    protected $num;

    // 构造方法初始化
    public function __construct($num){
        $this->num = $num;
    }

    // 返回课程所需的费用
    abstract public function cost();

    // 返回购买的课程
    abstract public function type();
}

class English extends Lesson{
    public function cost(){
        return 300 * $this->num;
    }

    public function type(){
        return '您购买的是英文课';
    }
}

class Math extends Lesson{
    public function cost(){
        return 180 * $this->num;
    }

    public function type(){
        return '您购买的是数学课';
    }
}

$lesson = new English(5);
echo $lesson->type().$lesson->cost();

echo '<br />';

$lesson = new Math(2);
echo $lesson->type().$lesson->cost();






















