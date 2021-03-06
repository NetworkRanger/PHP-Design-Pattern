<?php
header('Content-Type:text/html; charset=utf-8');

class Blog{
    private $user;
    private $date;
    private $title;

    public function __get($key){
        return $this->$key;
    }

    public function __construct($user, $date, $title){
        $this->user = $user;
        $this->date = $date;
        $this->title = $title;
    }

    public function addBlog(){
        return $this->user.'于'.$this->date.'发表了一篇无博文！';
    }

    public function getTitle(){
        return $this->title;
    }

    // 创建一个新增功能的访问入口
    public function visit(B $b){
        return $b->get($this);
    }

}

abstract class B{
    abstract public function get(Blog $blog);
}

class LevelBlog extends B{
    private $level;

    public function __construct($level){
        $this->level = $level;
    }

    public function get(Blog $blog){
        return $blog->user.'的博客等级为：'.$this->level.'级';
    }
}

class NumBlog extends B{
    private $num;

    public function __construct($num){
        $this->num = $num;
    }

    public function get(Blog $blog){
        return $blog->user.'博文的总篇数为：'.$this->num.'篇';
    }
}

$blog1 = new Blog('suse', '2015年3月2日','访问者模式');
echo $blog1->addBlog();
echo $blog1->getTitle();

echo '<br />';

$blog2 = new Blog('tom', '2015年4月5日', '观察者模式');
echo $blog2->addBlog();
echo $blog2->getTitle();

echo '<br />';

$blog3 = new Blog('mary', '2015年7月8日', '命令模式');
echo $blog3->addBlog();
echo $blog3->getTitle();
echo '<br />';
echo $blog3->visit(new LevelBlog(5));
echo '<br />';
echo $blog3->visit(new NumBlog(100));












