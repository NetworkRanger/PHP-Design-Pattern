<?php
header('Content-Type:text/html; charset=utf-8');

class ErrorObject{
    private $error;

    public function __construct($error){
        $this->error = $error;
    }

    public function getError(){
        return $this->error;
    }
}

class LogToTxt{
    private $errorObject;

    public function __construct($errorObject){
        $this->errorObject = $errorObject;
    }

    public function write(){
        fwrite(fopen('log.txt', 'w'), $this->errorObject->getError());
    }
}

$logtotxt = new LogToTxt(new ErrorObject('404:HTTP error!'));
$logtotxt->write();

// 1.扩展的话，这个系统是否已经上线，如果上线了，
// 修改类会和其他类及客户端发生连锁反应(一个地方修改，其他地方跟着改)
// 2.如果没有上线，那么直接修改要修改的地方即可。




























