<?php
header('Content-Type:text/html; charset=utf-8');

// 区域类
abstract class Tile{
    abstract public function exprience();
}

// 平原类
class Plain extends Tile{
    private $exprience = 2;
    public function exprience(){
        return $this->exprience;
    }
}

// 干净的平原
class CleanPlain extends Plain{
    public function exprience(){
        return parent::exprience() + 2;
    }
}

// 污染的平原
class PollutedPlain extends Plain{
    public function exprience(){
        return parent::exprience() - 4;
    }
}

// 既干净又污染的平原
class CleanPollutedPlain extends Plain{
    public function exprience(){
        $clean_plan = new CleanPlain();
        $polluted_plain = new PollutedPlain();
        return $clean_plan->exprience() + $polluted_plain->exprience() - parent::exprience();
    }
}

$plain = new Plain();
echo '在普通平原的经验值为'.$plain->exprience();

echo '<br />';

$clean_plain = new CleanPlain();
echo '在干净平原的经验值为'.$clean_plain->exprience();

echo '<br />';

$polluted_plain = new PollutedPlain();
echo '在污染平原的经验值为'.$polluted_plain->exprience();

echo '<br />';

$clean_polluted_plain = new CleanPollutedPlain();
echo '在既干净又污染平原的经验值为'.$clean_polluted_plain->exprience();