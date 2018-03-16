<?php
header('Content-Type:text/html; charset=utf-8');

class CompressList{
    private $file;
    private $typeObj;

    public function __construct(){
        $this->file = [];
    }

    public function addCompress($path, $title, $type){
        $file = ['path'=>$path, 'title'=>$title, 'type'=>$type];
        $this->file[] = $file;
    }

    public function run(){
        $info = '';
        foreach($this->file as $file){
            $this->typeObj = new $file['type'];
            $info .= $this->typeObj->get($file);
        }
        return $info;
    }
}

class Zip{
    public function get($file){
        return $file['title'].$file['path'].'[zip].<br />';
    }
}

class Gz{
    public function get($file){
        return $file['title'].$file['path'].'[gz].<br />';
    }
}

$compresslist = new CompressList();
$compresslist->addCompress('/web/list/123.zip', '小游戏一款', 'zip');
$compresslist->addCompress('/web/list/123.zip', '小游戏一款', 'zip');
$compresslist->addCompress('/web/list/123.zip', '小游戏一款', 'zip');
$compresslist->addCompress('/web/music', '音乐专辑一套', 'gz');
$compresslist->addCompress('/web/music', '音乐专辑一套', 'gz');
$compresslist->addCompress('/web/music', '音乐专辑一套', 'gz');
echo $compresslist->run();



































