<?php
header('Content-Type:text/html; charset=utf-8');

// 兵种类
abstract class Kind{
    // 兵种的集合数组
    protected $kind = [];

    // 添加兵种，添加陆军，添加舰队
    public function addKind(Kind $kind){
        $this->kind[] = $kind;
    }

    // 抽取兵种，添加陆军，添加舰队
    public function removeKind(Kind $kind){
        $this->kind = array_udiff($this->kind, [$kind],  create_function('$a,$b', 'return ($a === $b) ? 0:1;'));
    }

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

// 陆军类
class Army extends Kind{
    // 获取陆军总攻击力
    public function strength(){
        $strength = 0;
        foreach($this->kind as $kind){
            $strength += $kind->strength();
        }
        return $strength;
    }
}

// 舰队
class Warship extends Kind{
    // 获取舰队总攻击力
    public function strength(){
        $strength = 0;
        foreach($this->kind as $kind){
            $strength += $kind->strength();
            if($kind instanceof Sword) $strength -= 2;
            if($kind instanceof Gunner) $strength -= 5;
        }
        return $strength;
    }
}

$army1 = new Army();							//创建第一支陆军部队
$army1->addKind(new Sword());	//添加一名剑士10
$army1->addKind(new Sword());	//添加一名剑士10
$army1->addKind(new Sword());	//添加一名剑士10
$army1->addKind(new Gunner());			//添加一名火炮手28
echo '第一支陆军总攻击力为：'.$army1->strength();		//总攻击力

echo '<br />';

$army2 = new Army();							//创建第一支陆军部队
$army2->addKind(new Sword());	//添加一名剑士10
$army2->addKind(new Sword());	//添加一名剑士10
echo '第二支陆军总攻击力为：'.$army2->strength();		//总攻击力

echo '<br />';

$army3 = new Army();						//创建第三支部队，没有自己的士兵
$army3->addKind($army1);			//把第一支部队组进来
$army3->addKind($army2);			//把第二支部队组进来
echo '第三支陆军总攻击力为：'.$army3->strength();		//总攻击力

echo '<br />';

$warship1 = new Warship();
$warship1->addKind(new Sword());
$warship1->addKind(new Sword());
$warship1->addKind(new Sword());
$warship1->addKind(new Sword());
echo '第一支海军舰队的总攻击力为：'.$warship1->strength();

echo '<br />';

$army4 = new Warship();
$army4->addKind($army3);
$army4->addKind($warship1);
$army4->addKind(new Gunner());
echo '第一支陆军+海军舰队混合战队的总攻击力为：'.$army4->strength();



















