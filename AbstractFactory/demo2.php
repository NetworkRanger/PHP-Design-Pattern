<?php
header('Content-Type:text/html; charset=utf-8');

abstract class Image{
    abstract public function getWidth();

    abstract public function getHeight();
}

class PNG extends Image{
    public function getWidth(){
        return 'PNG长度为100';
    }

    public function getHeight(){
        return 'PNG高度为200';
    }
}

class GIF extends Image{
    public function getWidth(){
        return 'GIF长度为100';
    }

    public function getHeight(){
        return 'GIF高度为200';
    }
}

abstract class Factory{
    abstract public function getMessage();
    abstract public function getImage();
    abstract public function getDown();
}

abstract class Down{
    abstract public function getInfo();
}

class Down_PNG extends Down{
    public function getInfo(){
        return '下载PNG图片';
    }
}

class Down_GIF extends Down{
    public function getInfo(){
        return '下载GIF图片';
    }
}

class Factory_PNG extends Factory{
    public function getMessage(){
        return '您将要处理PNG，是否要处理呢?';
    }
    public function getImage(){
        return new PNG();
    }
    public function getDown(){
        return new Down_PNG();
    }
}

class Factory_GIF extends Factory{
    public function getMessage(){
        return '您将要处理GIF，是否处理呢？';
    }
    public function getImage(){
        return new GIF();
    }
    public function getDown(){
        return new Down_GIF();
    }
}


$png = new Factory_PNG();
echo $png->getMessage();
echo $png->getImage()->getWidth();
echo $png->getDown()->getInfo();

echo '<br />';

$gif = new Factory_GIF();
echo $gif->getMessage();
echo $gif->getImage()->getHeight();
echo $gif->getDown()->getInfo();