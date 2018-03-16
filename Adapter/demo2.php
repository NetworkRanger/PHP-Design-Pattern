<?php
header('Content-Type:text/html; charset=utf-8');

class ErrorObject{
    private $error;
    private $line;
    private $text;

    public function __construct($error){
        $this->error = $error;
        $temp = explode(':', $this->error);
        $this->line = $temp[0];
        $this->text = $temp[1];
    }

    public function getError(){
        return $this->error;
    }

    public function getLine(){
        return $this->line;
    }

    public function getText(){
        return $this->text;
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

class LogToXml{
    private $errorObject;

    public function __construct($errorObject){
        $this->errorObject = $errorObject;
    }

    public function write(){
        $xml = "<root>\r\n";
        $xml .= '<line>'.$this->errorObject->getLine()."</line>\r\n";
        $xml .= '<text>'.$this->errorObject->getText()."</text>\r\n";
        $xml .= '</root>';
        file_put_contents('log.xml', $xml);
    }
}

$logtotxt = new LogToTxt(new ErrorObject('404:Http error!'));
$logtotxt->write();

$logtoxml = new LogToXml(new ErrorObject('404:Http error!'));
$logtoxml->write();




































