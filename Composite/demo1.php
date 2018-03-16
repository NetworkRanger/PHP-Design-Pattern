<?php
header('Content-Type:text/html; charset=utf-8');

// 兵种类
abstract class Kind{
    abstract public function strength();
}

// 剑士
class Sword extends Kind{
    public function strength(){
        return 10;
    }
}

// 火炮手
class Gunner extends Kind{
    public function strength(){
        return 28;
    }
}

// 陆军部队
class Army{
    // 兵种的集合数组
    private $kind = [];

    // 添加兵种
    public function addKind(Kind $kind){
        $this->kind[] = $kind;
    }

    // 获取陆军总攻击力
    public function getStrength(){
        $strength = 0;
        foreach($this->kind as $kind){
            $strength += $kind->strength();
        }
        return $strength;
    }
}

$army1 = new Army(); // 创建第一支陆军部队
$army1->addKind(new Sword()); // 添加一名剑士
$army1->addKind(new Sword()); // 添加一名剑士
$army1->addKind(new Sword()); // 添加一名剑士
$army1->addKind(new Gunner()); // 添加一名火炮手
echo '第一支陆军总攻击边为：'.$army1->getStrength(); // 总攻击力

echo '<br />';

$army2 = new Army(); // 创建第一支陆军部队
$army2->addKind(new Sword()); // 添加一名剑士
$army2->addKind(new Sword()); // 添加一名剑士
echo '第二支陆军总攻击边为：'.$army2->getStrength(); // 总攻击力





















