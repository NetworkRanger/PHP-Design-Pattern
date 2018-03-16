<?php
header('Content-Type:text/html; charset=utf-8');

class Login{
    private $user = 'admin';
    private $pass = '123456';

    public function execute($user, $pass){
        if($this->user == $user && $this->pass = $pass){
            return true;
        }
        return false;
    }
}

class FeedBack{
    public function execute($name, $date, $info){
        if($name && $date && $info){
            return true;
        }
        return false;
    }
}

$login = new Login();
if($login->execute('admin', '123456')){
    echo '登录成功!';
}else{
    echo '登录失败！';
}

$feedback = new FeedBack();
if($feedback->execute('suse', '2015,5,4', '命令模式')){
    echo '反馈成功!';
}else{
    echo '反馈失败！';
}




























