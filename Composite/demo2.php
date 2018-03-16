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
    //陆军部队的集合数组
    private $army = [];

    // 添加兵种
    public function addKind(Kind $kind){
        $this->kind[] = $kind;
    }

    // 添加陆军部队
    public function addArmy(Army $army){
        if(!in_array($army, $this->army)){
            $this->army[] = $army;
        }
    }

    // 抽取陆军部队
    public function removeArmy(Army $army){
       if(in_array($army, $this->army)){
            $this->army = array_udiff($this->army, [$army],  create_function('$a,$b', 'return ($a === $b) ? 0:1;'));
       }
    }

    // 获取陆军总攻击力
    public function getStrength(){
        $strength = 0;
        foreach($this->army as $army){
            $strength += $army->getStrength(); // 这里可以获取组进来的总攻击力
        }
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

echo '<br />';

$army3 = new Army(); // 创建第三支部队，没有自己的士兵
$army3->addArmy($army1); // 把第一支部队组进来
$army3->addArmy($army2); // 把第二支部队组进来
$army3->addArmy($army1); // 这里会失效，因为组进来了，无需再组
$army3->removeArmy($army1); // 把第一支部队从第三支部队中移除
$army3->removeArmy($army2); // 把第二支部队从第三支部队中移除
$army3->addArmy($army1); // 把第二支部队组进来
echo '第三支陆军总攻击边为：'.$army3->getStrength(); // 总攻击力

















