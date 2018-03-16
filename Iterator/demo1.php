<?php
header('Content-Type:text/html; charset=utf-8');

$array = ['A', 'B', 'C', 'D', 'E'];

foreach($array as $key => $value){
    echo $key.'--'.$value.'<br />';
}

echo $array[2];
echo $array[2+1];












