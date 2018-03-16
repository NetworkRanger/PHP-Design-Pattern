<?php
header('Content-Type:text/html; charset=utf-8');

class Blog{
    private $user;
    private $date;

    public function __construct($user, $date){
        $this->user = $user;
        $this->date = $date;
    }

    public function addBlog(){
        return $this->user.'于'.$this->date.'发表了一篇无博文！';
    }
}

$blog1 = new Blog('suse', '2015年3月2日');
echo $blog1->addBlog();

echo '<br />';

$blog2 = new Blog('tom', '2015年4月5日');
echo $blog2->addBlog();

echo '<br />';

$blog3 = new Blog('mary', '2015年7月8日');
echo $blog3->addBlog();




