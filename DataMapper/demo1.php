<?php
header('Content-Type:text/html; charset=utf-8');

class DB{
    private $pdo;

    public function __construct(){
        try{
            $drive_opt = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
            $this->pdo = new PDO('mysql:host=localhost;dbname=db', 'root', 'password', $drive_opt);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            exit('数据库连接错误：'.$e->getMessage());
        }
    }

    public function query($sql){
        return $this->pdo->query($sql);
    }
};

class User{
    public $id;
    public $name;
    public $email;
    private $db;

    public function __construct($id){
        $this->db = new DB();
        $res = $this->db->query('select * from user limit 1 where id='.$id);
        $data = $res->fetch_assoc();
        $this->id = $id;
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function save(){
        $this->db->query("update user set name='$this->name', email='$this->email' where id=$this->id");
    }
}

$user = new User(1);
var_dump($user);
$user->name = 'suse';
$user->email = 'suse@iphpjs.com';
$user->save();