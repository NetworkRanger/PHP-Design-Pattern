<?php
header('Content-Type:text/html; charset=utf-8');

function write(){
    return '正在写入txt文件';
}

function read(){
    return '正在读取txt文件';
}

echo write();
echo read();