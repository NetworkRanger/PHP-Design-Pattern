<?php
interface DB{
    public function connect($host, $user, $passwd, $dbname);
    public function query($sql);
    public function close();
}

class Mysql implements DB{
    private $conn;

    public function connect($host, $user, $passwd, $dbname){
        $this->conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $this->conn);
    }

    public function query($sql){
        return mysql_query($sql, $this->conn);
    }

    public function close(){
        mysql_close($this->conn);
    }
}

class Mysqli implements DB{
    private $conn;

    public function connect($host, $user, $passwd, $dbname){
        $this->conn = mysqli_connect($host, $user, $passwd, $dbname);
    }

    public function query($sql){
        return mysqli_query($this->conn, $sql);
    }

    public function close(){
        mysqli_close($this->conn);
    }
}

class Pdo implements DB{
    private $conn;

    public function connect($host, $user, $passwd, $dbname){
        $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
    }

    public function query($sql){
        return $this->conn->query($sql);
    }

    public function close(){
        unset($this->conn);
    }
}

$db = new Mysql();
$db->connect('127.0.0.1', 'root', 'password', 'db');
$db->query('select * from user');
$db->close();



































