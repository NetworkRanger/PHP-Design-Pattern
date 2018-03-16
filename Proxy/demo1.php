<?php
header('Content-Type:text/html; charset=utf-8');

class Internet{
    private $ip;

    public function __construct($ip){
        $this->ip = $ip;
    }

    public function getServer(){
        return $this->connect();
    }

    public function connect(){
        return $this->ip.'欢迎来到全球互联网，我们提供冲浪，视频，游戏等服务！';
    }
}

$internet = new Internet('111.111.111.111');
echo $internet->getServer();


















