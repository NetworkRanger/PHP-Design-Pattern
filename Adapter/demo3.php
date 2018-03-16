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

class ErrorXmlObject extends ErrorObject{
    private $line;
    private $text;

    public function __construct($error){
        parent::__construct($error);
        $temp = explode(':', $this->getError());
        $this->line = $temp[0];
        $this->text = $temp[1];
    }

    public function getLine(){
        return $this->line;
    }

    public function getText(){
        return $this->text;
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


$logtotxt = new LogToTxt(new ErrorObject('404:HTTP error!'));
$logtotxt->write();

$logtoxml = new LogToXml(new ErrorXmlObject('404:Http error!'));
$logtoxml->write();
























