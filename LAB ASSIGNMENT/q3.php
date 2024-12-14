<?php 


class Fruit{

public $name;
private $color;

    public function __construct($name,$color){
   $this->name = $name;
   $this->color =   $color;
    }

public function set_name($name){
 $this->name = $name;
}

public function get_name(){
 return $this->name;
}


}

class Mango extends Fruit{

    public function set_name($name) {
      $this->name = "Delicious " . $name;
    }

    public function get_name() {
        return "Mango Variety: " . $this->name;
    }

}

$mango = new Fruit("","Yellow");
$mango->set_name("mango");

echo "The name of the Fruit is : ". $mango->get_name();

echo "<br />";

$tunda = new Mango(''," Yellow");
$tunda->set_name("tunda_mango");
echo $tunda->get_name();




?>