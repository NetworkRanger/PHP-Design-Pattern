<?php
header('Content-Type:text/html; charset=utf-8');

// 观察者类
abstract class Observer{
    abstract public function update(Obserable $obserable);
}

class MailWarning extends Observer{
    public function update(Obserable $obserable){
        $info = $obserable->getInfo();
        $ret = $obserable->getRet();
        if(!$ret){
            echo '发送一封邮件给总管理员：用户名：'.$info[0].'，密码：'.$info[1].'登录错误！';
        }
    }
}

class Logger extends Observer{
    public function update(Obserable $obserable){
        $info = $obserable->getInfo();
        echo '写入数据库：用户名：'.$info[0].'，密码：'.$info[1].'！';
    }
}

// 被观察者
abstract class Obserable{
    abstract public function attach(Observer $observer); // 注册观察者
    abstract public function detach(Observer $observer); // 撤销观察者
    abstract public function notify(); // 响应观察者
}

class Login extends Obserable{
    private $user = 'admin';
    private $pass = '123456';
    private $ret;
    private $info;
    private $observers = [];

    public function attach(Observer $observer){
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer){
        if (in_array($observer, $this->_observers)) {
            $this->observers = array_udiff($this->observers, array($observer),
                create_function('$a,$b', 'return ($a === $b) ? 0:1;'));
        }
    }

    public function notify(){
        foreach($this->observers as $value){
            $value->update($this);
        }
    }

    public function handleLogin($user, $pass){
        $this->info = [$user, $pass];
        switch($this->check($this->info)){
        case 1:
            $this->ret = true;
            break;
        case 2:
            $this->ret = false;
            break;
        }
        $this->notify();
        return $this->ret;
    }

    public function check($info){
        if($info[0] == $this->user && $info[1] == $this->pass){
            return 1;
        }
        return 2;
    }
    
    public function getInfo(){
        return $this->info;
    }

    public function getRet(){
        return $this->ret;
    }
}

$login = new Login();
$mail_waring = new MailWarning();
$login->attach($mail_waring);
$login->attach(new Logger());
$login->detach($mail_waring);
echo $login->handleLogin('admin', '123456');












