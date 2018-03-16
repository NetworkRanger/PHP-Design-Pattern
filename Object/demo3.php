<?php
header('Content-Type:text/html; charset=utf-8');


abstract class Handler{ //抽象类，提供规范，让子类继承
    abstract public function write(); // 提供规范，自己不实现，让子类实现
    abstract public function read();
    static public function getObject($file){//这里实现了类切换
        if($file == 'xml'){
            return new XmlHandler();
        }elseif($file == 'txt'){
           return new TxtHandler();
        }
    }
}

// 这里有两个模块Xml类，Txt类
// Xml类里面有两个成分，write xml文件， read xml文件
// Xml类里面的两个成分功能是相当的，高度集中，不分散。
// 高内聚 = 成分高度集中，还与外面不关联。

// xml类和txt类，关联吗？不关联
// 如果xml类做了大量修改，txt类不会受到任何影响，那么也就是说，两个类之间都非常独立。
// 低耦合 = 两个模块之间没有太太的关联性。



//专门处理xml文件的类
class XmlHandler extends Handler{
    public function write(){
        //编写写入txt的业务代码
        return '正在写入txt文件';
    }

    public function read(){
        return '正在读取txt文件';
    }
}

//专门处理txt文件的类
class TxtHandler extends Handler{
    public function write(){
        return '正在写入xml文件';
    }

    public function read(){
        return '正在读取xml文件';
    }
}

$file = 'txt';
$obj = Handler::getObject($file);
echo $obj->write();
echo $obj->read();







