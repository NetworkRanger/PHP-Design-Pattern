<?php
header('Content-Type:text/html; charset=utf-8');

//课程类
class Lesson{
    // 课程购买人数
    private $num;
    // 课程的类型
    private $type;
    // 英文课的标识
    const ENGLISH = 1;
    // 数学课的标识
    const MATH = 2;

    // 构造方法初始化
    public function __construct($num, $type){
        $this->num = $num;
        $this->type = $type;
    }

    // 返回课程所需的费用
    public function cost(){
        switch($this->type){
        case self::ENGLISH:
            return 300 * $this->num;
        case self::MATH:
            return 180 * $this->num;
            break;
        }
    }

    // 返回购买的课程
    public function type(){
        switch($this->type){
        case self::ENGLISH:
            return '您购买的是英文课';
            break;
        case self::MATH:
            return '您购买的是数学课';
            break;
        }
    }
}

$lesson = new Lesson(5, Lesson::ENGLISH);
echo $lesson->type().$lesson->cost();

echo '<br />';

$lesson = new Lesson(2, Lesson::MATH);
echo $lesson->type().$lesson->cost();














