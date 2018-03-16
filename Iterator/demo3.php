<?php
header('Content-Type:text/html; charset=utf-8');

class AllUser implements Iterator{
    private $ids;
    private $data = [];
    private $index;

    public function __construct(){
        $db = Factory::getDatabase();
        $result = $db->query("select id from user");
        $this->ids = $result->fetch_all(MYSQLI_ASSOC);
    }

    public function current(){
        $id = $this->ids[$this->index]['id'];
        return Factory::getUser($id);
    }

    public function next(){
        ++$this->index;
    }

    public function valid(){
        return $this->index < count($this->ids);
    }

    public function rewind(){
        $this->index = 0;
    }

    public function key(){
        return $this->index;
    }
}

$users = new AllUser();
foreach($users as $user){
    var_dump($user->name);
}























