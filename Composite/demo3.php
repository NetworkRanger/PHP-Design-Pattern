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

// 舰队类
class Warship{
    // 兵种的集合数组
    private $kind = [];
    //舰队的集合数组
    private $warship = [];

    // 添加兵种
    public function addKind(Kind $kind){
        if(count($this->kind) < 5){
            $this->kind[] = $kind;
        }
    }

    // 添加海军部队
    public function addWarship(Warship $warship){
        if(!in_array($warship, $this->warship)){
            $this->warship[] = $warship;
        }
    }

    // 抽取海军部队
    public function removeWarship(Warship $warship){
        if(in_array($warship, $this->warship)){
            $this->warship = array_udiff($this->warship, [$warship],  create_function('$a,$b', 'return ($a === $b) ? 0:1;'));
        }
    }

    // 获取舰队总攻击力
    public function getStrength(){
        $strength = 0;
        foreach($this->warship as $warship){
            $strength += $warship->getStrength(); // 这里可以获取组进来的总攻击力
        }
        foreach($this->kind as $kind){
            if($kind instanceof Sword) $temp = $kind->strength() -2;
            if($kind instanceof Gunner) $temp = $kind->strength() - 5;
            $strength += $temp;
        }
        return $strength;
    }
}

$warship1 = new Warship();
$warship1->addKind(new Sword());
$warship1->addKind(new Sword());
$warship1->addKind(new Sword());
$warship1->addKind(new Sword());
$warship1->addKind(new Sword());
$warship1->addKind(new Sword()); // 添加第六个士兵无效
echo '第一支海军舰队的总攻击力为：'.$warship1->getStrength();

echo '<br />';

$warship2 = new Warship();
$warship2->addKind(new Gunner());
$warship2->addKind(new Gunner());
$warship2->addKind(new Sword());
echo '第二支海军舰队的总攻击力为：'.$warship2->getStrength();


echo '<br />';

$warship3 = new Warship();
$warship3->addWarship($warship1);
$warship3->addWarship($warship2);
echo '第三支海军舰队的总攻击力为：'.$warship3->getStrength();




