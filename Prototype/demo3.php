<?php
header('Content-Type:text/html; charset=utf-8');

abstract class File{
    abstract public function size();
}

class EXE extends File{
    public function size(){
        return 'EXE大小为2M';
    }
}

class PHP extends File{
    public function size(){
        return 'PHP大小为5M';
    }
}

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
    private $exe;

    public function __construct(){
        $this->exe = new EXE();
    }

    public function getWidth(){
        return 'GIF长度为100';
    }
    public function getHeight(){
        return 'GIF高度为200';
    }
}

class Factory{
    private $image;
    private $file;

    public function __construct(Image $image, File $file){
        $this->image = $image;
        $this->file = $file;
    }

    public function getImage(){
        return $this->image;
    }

    public function getFile(){
        return $this->file;
    }
}

$factory = new Factory(new GIF(), new PHP());
$gif = $factory->getImage();
echo $gif->getWidth();



















