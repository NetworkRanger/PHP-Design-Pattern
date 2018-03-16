<?php
header('Content-Type:text/html; charset=utf-8');

class MailWarning{
    static public function update($info){
        echo '发送一封邮件给总管理员：用户名：'.$info[0].'，密码：'.$info[1].'登录错误！';
    }
}

class Logger{
    static public function update($info){
        echo '写入数据库：用户名：'.$info[0].'，密码：'.$info[1].'！';
    }
}

class Login{
    private $user = 'admin';
    private $pass = '123456';
    private $info;

    public function handleLogin($user, $pass){
        $this->info = [$user, $pass];
        switch($this->check($this->info)){
        case 1:
            $ret = true;
            break;
        case 2:
            $ret = false;
            break;
        }
        Logger::update($this->info);
        if(!$ret) MailWarning::update($this->info);
        return $ret;
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
}

$login = new Login();
echo $login->handleLogin('admin', '123456');
echo '<br />';
print_r($login->getInfo());











