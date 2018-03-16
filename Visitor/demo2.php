<?php
header('Content-Type:text/html; charset=utf-8');

class Blog{
    private $user;
    private $date;
    private $title;

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




