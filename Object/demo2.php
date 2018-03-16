<?php
header('Content-Type:text/html; charset=utf-8');


// 两个模块，write()函数，read()函数
// 内聚 = 模块内部的成分高度集中，就是高内聚，如果内部成分分散，那就是低内聚
// write() 方法内部成分是分散的，内部成分还不集中。
// 这里write()方法是低内聚。

// 耦合是模块与模块之间，内聚是模块内部之间
// write()和read()关联不?非常关联，紧密关联。
// write()和read()两个函数，能够分开使用吗？能独立吗？不能
// write()和read()模块之间是高耦合。


function write($file){
    if($file == 'txt'){
        //编写写入txt的业务代码
        return '正在写入txt文件';
    }else if($file == 'xml'){
        return '正在写入xml文件';
    }
}

function read($file){
    if($file == 'txt'){
        return '正在读取txt文件';
    }else if($file == 'xml'){
        return '正在读取xml文件';
    }
}

$file = 'txt';

echo write($file);
echo read($file);