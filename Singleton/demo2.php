<?php
header('Content-Type:text/html; charset=utf-8');

class DB{
    private $db;

    public function __construct(){
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=db', 'root', 'password');
            echo '创建了一次数据库连接对象';
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }

    public function query($sql){
        return $this->db->query($sql);
    }
}

class Article{
    private $db;

    public function __construct(){
       $this->db = new DB();
    }

    public function query($sql){
        return $this->db->query($sql);
    }
}

class User{
    private $db;

    public function __construct(){
        $this->db = new DB();
    }

    public function query($sql){
        return $this->db->query($sql);
    }
}

$article = new Article();
var_dump($article->query('SELECT * FROM article'));

echo '<br />';

$user = new User();
var_dump($user->query('SELECT * FROM user'));