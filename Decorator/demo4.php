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

// 高原类
class Highland extends Tile{
    private $exprience = 3;
    public function exprience(){
        return $this->exprience;
    }
}

// 装饰器类
abstract class Decorator extends Tile{
    protected $tile;
    public function __construct(Tile $tile){
        $this->tile = $tile;
    }
}

// 干净的
class Clean extends Decorator{
    public function exprience(){
        return $this->tile->exprience() + 2;
    }
}

// 污染的
class Polluted extends Decorator{
    public function exprience(){
        return $this->tile->exprience() - 4;
    }
}

$plain = new Plain();
echo '在普通平原的经验值为'.$plain->exprience();

echo '<br />';

$clean_plain = new Clean(new Plain());
echo '在干净平原的经验值为'.$clean_plain->exprience();

echo '<br />';

$polluted_plain = new Polluted(new Plain());
echo '在污染平原的经验值为'.$polluted_plain->exprience();

echo '<br />';

$clean_polluted_plain = new Clean(new Polluted(new Plain()));
echo '在既干净又污染平原的经验值为'.$clean_polluted_plain->exprience();

echo '<br /><br />';

$highland = new Highland();
echo '在普通高原的经验值为'.$highland->exprience();

echo '<br />';

$clean_highland = new Clean(new Highland());
echo '在干净高原的经验值为'.$clean_highland->exprience();

echo '<br />';

$polluted_highland = new Polluted(new Highland());
echo '在污染高原的经验值为'.$polluted_highland->exprience();

echo '<br />';

$clean_polluted_highland = new Clean(new Polluted(new Highland()));
echo '在既干净又污染高原的经验值为'.$clean_polluted_highland->exprience();














