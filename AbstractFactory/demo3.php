<?php
header('Content-Type:text/html; charset=utf-8');

// 面向接口编程，这是一个接口，抽象类，用于规范业务层子类实现
abstract class AUser{
    abstract public function selectUser(); // 查找
    abstract public function updateUser(); // 修改
    abstract public function deleteUser(); // 删除
    abstract public function addUser(); // 新增
}

// 这是一个业务层，实现接口即可
class UserAction extends AUser{
    public function selectUser(){
        return '查找用户';
    }

    public function updateUser(){
        return '修改用户';
    }

    public function deleteUser(){
        return '删除用户';
    }

    public function addUser(){
        return '新增用户';
    }
}

// 工厂，用来生产各个产品的业务层对象
// 每个对象，可以使用单例模式，让他在整个流程中只保持一个实例
class Factory{
    static public function getUser(){
        return new UserAction();
    }
}

// 用于客户端直接调用的类
class User{
    private $obj;

    public function __construct(){
        $this->obj = Factory::getUser();
    }

    public function selectUser(){
        return $this->obj->selectUser();
    }

    public function updateUser(){
        return $this->obj->updateUser();
    }

    public function deleteUser(){
        return $this->obj->deleteUser();
    }

    public function addUser(){
        return $this->obj->deleteUser();
    }
}

$user = new User();
echo $user->selectUser();
echo '<br />';
echo $user->addUser();










