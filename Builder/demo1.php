<?php
header('Content-Type:text/html; charset=utf-8');

class Product{
    private $type;
    private $size;
    private $color;

    public function setType($type){
        $this->type = $type;
    }

    public function setSize($size){
        $this->size = $size;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getProductInfo(){
        return $this->type.$this->size.$this->color;
    }
}

$color = '红色';
$type = '大号';
$size = '10CM';

$product1 = new Product();
$product1->setType($type);
$product1->setSize($size);
$product1->setColor($color);
echo $product1->getProductInfo();

echo '<br />';

$color = '蓝色';
$type = '小号';
$size = '5CM';

$product2 = new Product();
$product2->setType($type);
$product2->setSize($size);
$product2->setColor($color);
echo $product2->getProductInfo();
























