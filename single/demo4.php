<?php
header('Content-Type:text/html; charset=utf-8');

class DB{
    private $db;
    // 静态是通过类::字段直接访问的，private表示外部不能访问
    static private $instance;
    // 访问这个实例的公共静态方法
    static public function getInstance(){
        //如果对象没有创建，就创建它，如果创建了，就直接返回
        if(!(self::$instance instanceof self)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    // 单一职责问题，私有化克隆
    private function __clone(){}
    // 私有化构造方法
    private function __construct(){
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=db', 'root', 'password');
            echo '创建了一个数据库连接对象';
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }

    public function query($sql){
        return $this->db->query($sql);
    }
}

$db = DB::getInstance();
var_dump($db->query('SELECT * FROM article'));

echo '<br />';

$db = new User();
var_dump($db->query('SELECT * FROM user'));