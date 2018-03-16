<?php
header('Content-Type:text/html; charset=utf-8');

class Internet{
    private $ip;

    public function __construct($ip){
        $this->ip = $ip;
    }

    protected function getServer(){
        return $this->connect();
    }

    protected function connect(){
        return $this->ip.'欢迎来到全球互联网，我们提供冲浪，视频，游戏等服务！';
    }
}

class Proxy extends Internet{
    public function getServer(){
        return '代理网欢迎您的光临'.$this->connect();
    }
}

$proxy = new Proxy('111.111.111.111');
echo $proxy->getServer();


















