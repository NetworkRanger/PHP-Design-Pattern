<?php
header('Content-Type:text/html; charset=utf-8');

class Canvas{
    private $data;

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
        foreach($this->data as $line){
            foreach($line as $char){
                echo $char;
            }
            echo "<br />\n";
        }
    }
}

$canvas = new Canvas();
$canvas->draw();















