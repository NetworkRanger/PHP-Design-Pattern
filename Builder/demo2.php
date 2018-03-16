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

class ProductBuilder{
    private $product;

    public function __construct(){
        $this->product = new Product();
    }

    public function build($productArr){
        $this->product->setType($productArr['type']);
        $this->product->setSize($productArr['size']);
        $this->product->setColor($productArr['color']);
    }

    public function getProduct(){
        return $this->product;
    }
}

$productArr = [
    'color' => '红色',
    'type' => '大号',
    'size' => '10CM',
];

$product_builder1 = new ProductBuilder();
$product_builder1->build($productArr);
echo $product_builder1->getProduct()->getProductInfo();

echo '<br />';


$productArr = [
    'color' => '蓝色',
    'type' => '小号',
    'size' => '5CM',
];

$product_builder2 = new ProductBuilder();
$product_builder2->build($productArr);
echo $product_builder2->getProduct()->getProductInfo();























