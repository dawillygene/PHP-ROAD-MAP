<?php
class Fruit {
    // Properties
    public $name;
    public $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function get_name() {
        return $this->name;
    }
}


$apple = new Fruit("Apple", "Red");


echo "Initial Name: " . $apple->get_name() . "<br>";
echo "Initial Color: " . $apple->color . "<br>";

$apple->set_name("Green Apple");


echo "Updated Name: " . $apple->get_name() . "<br>";



$mango = new Fruit("Mango", "Yellow");

echo "Initial Name: " . $mango->get_name() . "<br>";
echo "Initial Color: " . $mango->color . "<br>";


$mango->set_name("Ripe Mango");

echo "Updated Name: " . $mango->get_name() . "<br>";


class Mango extends Fruit{


public function __construct($name, $color){
    parent::__construct($name,$color);
}

public function set_name($name){
    parent::set_name("Mango: " . $name);
}


public function get_name(){
    return "Fruit Name " . parent::get_name();
}
 

}


$newMango = new Mango("Embe","Njano");
echo "Initial Name " .$newMango->get_name(); 
echo "<br>";
echo "Initial colour" .$newMango->color;





?>