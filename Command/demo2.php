<?php
header('Content-Type:text/html; charset=utf-8');

class Login{
    private $user = 'admin';
    private $pass = '123456';

    public function execute(Context $context){
        if($this->user == $context->getParam('user') && $this->pass = $context->getParam('pass')){
            return true;
        }
        return false;
    }
}

class FeedBack{
    public function execute(Context $context){
        if($context->getParam('name') && $context->getParam('date') && $context->getParam('info')){
            return true;
        }
        return false;
    }
}

class Context{
    private $params = [];
    private $succ;
    private $error;

    public function getSucc(){
        return $this->succ;
    }

    public function setSucc($succ){
        $this->succ = $succ;
    }

    public function getError(){
        return $this->error;
    }

    public function setError($error){
        $this->error = $error;
    }

    public function addParam($key, $value){
        $this->params[$key] = $value;
    }

    public function getParam($key){
        return $this->params[$key];
    }
}

class Factory{
    static public function getCommand($action){
        return new $action;
    }
}

class Controller{
    private $context;

    public function __construct(){
        $this->context = new Context();
    }

    public function getContext(){
        return $this->context;
    }

    public function process(){
        $cmd = Factory::getCommand($this->context->getParam('action'));
        if($cmd->execute($this->context)){
            return $this->context->getSucc();
        }else{
            return $this->context->getError();
        }
    }
}

$controller = new Controller();
$context = $controller->getContext();
$context->addParam('action', 'Login');
$context->addParam('user', 'admin');
$context->addParam('pass', '123456');
$context->setSucc('登录成功！');
$context->setError('登录失败！');
echo $controller->process();

echo '<br />';
$controller = new Controller();
$context = $controller->getContext();
$context->addParam('action', 'Feedback');
$context->addParam('name', 'suse');
$context->addParam('date', '2015,5,4');
$context->addParam('info', '命令模式');
$context->setSucc('反馈成功！');
$context->setError('反馈失败！');
echo $controller->process();




















