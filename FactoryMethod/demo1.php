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

$png = new PNG();
echo $png->getWidth();

echo '<br />';

$gif = new GIF();
echo $png->getHeight();