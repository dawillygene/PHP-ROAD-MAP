<?php
class Product {
    public $name;
    public $description;
    public $price;
}

$product1 = new Product();
$product1->name = 'iPhone 12';
$product1->description = 'Apple product';
$product1->price = 'Tsh 2,000,000';

echo "Name: " . $product1->name . "<br>";
echo "Description: " . $product1->description . "<br>";
echo "Price: " . $product1->price . "<br>";

?>