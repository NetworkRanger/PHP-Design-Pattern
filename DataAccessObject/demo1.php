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

    public function select($sql){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $result = [];
        while(!!$rowObj = $stmt->fetchObject()){
            $result[] = $rowObj;
        }
        return $stmt;
    }
}

$db = new DB;
print_r($db->select('SELECT user,email FROM user')); // 裸写SQL

echo '<br />';

print_r($db->select('SELECT user,email FROM user WHERE id<20'));

echo '<br />';

print_r($db->select('SELECT user,email FROM user WHERE id<20 LIMIT 0,2'));



























