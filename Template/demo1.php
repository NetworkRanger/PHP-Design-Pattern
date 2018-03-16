<?php
header('Content-Type:text/html; charset=utf-8');

class Template{
    private $price = 10;

    public function getPrice(){
        return $this->price;
    }
}

class Sell1 extends Template{
    public function getPrice(){
        return parent::getPrice()*0.8;
    }
}

class Sell2 extends Template{
    public function getPrice(){
        return parent::getPrice()*2;
    }
}

$sell = new Sell1();
echo $sell->getPrice();

echo '<br />';

$sell = new Sell2();
echo $sell->getPrice();






















