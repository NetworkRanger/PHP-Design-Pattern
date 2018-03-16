<?php
header('Content-Type:text/html; charset=utf-8');

interface DrawDecorator{
    public function beforeDraw();
    public function afterDraw();
}

class Canvas{
    private $data;
    private $decorators = [];

    function __construct($width = 20, $height = 10){
        $data = [];
        for($i = 0;$i < $height;$i++){
            for($j = 0;$j < $width;$j++){
                $data[$i][$j] = '*';
            }
        }
        $this->data = $data;
    }

    function draw(){
        $this->beforeDraw();
        foreach($this->data as $line){
            foreach($line as $char){
                echo $char;
            }
            echo "<br />\n";
        }
        $this->afterDraw();
    }

    function addDecorator(DrawDecorator $decorator){
        $this->decorators[] = $decorator;
    }

    public function beforeDraw(){
        foreach($this->decorators as $decorator){
            $decorator->beforeDraw();
        }
    }

    public function afterDraw(){
        $decorators = array_reverse($this->decorators);
        foreach($decorators as $decorator){
            $decorator->afterDraw();
        }
    }
}

class ColorDrawDecorator implements DrawDecorator{
    private $color;

    public function __construct($color){
        $this->color = $color;
    }

    public function beforeDraw(){
        echo '<div style="color:'.$this->color.';">';
    }

    public function afterDraw(){
        echo '</div>';
    }
}

$canvas = new Canvas();
$canvas->addDecorator(new ColorDrawDecorator('green'));
$canvas->draw();















