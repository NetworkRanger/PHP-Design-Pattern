<?php
header('Content-Type:text/html; charset=utf-8');

class CompressList{
    private $file;

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
            switch($file['type']){
            case 'zip':
                $info .= $this->getZip($file);
                break;
            case 'gz':
                $info .= $this->getGz($file);
                break;
            }
        }
        return $info;
    }

    public function getZip($file){
        return $file['title'].$file['path'].'[zip].<br />';
    }

    public function getGz($file){
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



































