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

class Factory{
    const PNG = 'png';
    const GIF = 'gif';

    static public function getMessage($image){
        switch($image){
        case self::PNG:
            return '您将要处理PNG，是否处理呢？';
            break;
        case self::GIF:
            return '您将要处理GIF，是否处理呢？';
            break;
        }
    }

    static public function getImage($image){
        switch($image){
        case self::PNG:
            return new PNG();
            break;
        case self::GIF:
            return new GIF();
            break;
        }
    }
}

echo Factory::getMessage(Factory::PNG);
$image = Factory::getImage(Factory::PNG);
echo $image->getWidth();

echo '<br />';

echo Factory::getMessage(Factory::GIF);
$image = Factory::getImage(Factory::GIF);
echo $image->getHeight();

