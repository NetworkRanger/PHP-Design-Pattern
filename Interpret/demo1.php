<?php
header('Content-Type:text/html; charset=utf-8');

abstract class Compile{
    abstract public function expression($parse, $str);
}

//变量操作
class Variable extends Compile{
    public function expression($parse, $str){
        $patten = '/\{\$([\w]+)\}/e';
        if(preg_match($patten, $str)){
            $str = preg_replace($patten, "\$parse->vars['$1']", $str);
        }
        return $str;
    }
}

// 解析类
class Parse{
    private $vars = [];

    public function __get($_key) {
        return $this->$_key;
    }

    public function assign($var, $value){
        $this->vars[$var] = $value;
    }

    public function display($str){
        $variable = new Variable();
        $str = $variable->expression($this, $str);
        return $str;
    }
}

$parse = new Parse();
$parse->assign('name', 'suse');
$parse->assign('age', 20);

$str = '

This is {$name}, {$age}岁。

';

echo $parse->display($str);




















