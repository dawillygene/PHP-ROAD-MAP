<?php  

echo "my name is Elia william mariki";
echo "<br/>";
echo "my daughter's name is Heaven light ELia mariki";

echo "php stands for HyperText PreProcessor";

$name = "ELIA WILLIAM";
echo "<br/>";

echo "my name is " . $name . " MARIKI";


echo "<br>";

$number = 5;

function myTest(){

    // echo "<p>Variable number is : $number </p>";

}

 myTest();

echo "the value of a number is $number";

echo "<p>Variable number is : $number </p>";



echo "<h2>PHP is Fun!</h2>";
echo "Hello world!<br>";
echo "I'm about to learn PHP!<br>";
echo "This ", "string ", "was ", "made ", "with multiple parameters.";

echo "<br>";

$word1 = "hello guys";
$word2 = "am so exited to see you!";

echo "when we are greeting each other we say $word1 <br>";
echo "so you see php is so fun and easy <br>";

$number2 = 56213;
var_dump($number2);


$state1 = true;
$state2 = false;

var_dump($state1);
var_dump($state2);


$cars = array("volvo","benzi","motor");
var_dump($cars);

echo "<br/>";



$haroon = ' my name is Haroon';

echo "this is one of my student and he said $haroon <br/>";
echo 'this is one of my student and he said' .$haroon. '<br/>';
echo "this is one of my student and he said" .$haroon. "<br/>";
echo "this is one of my student and he said {$haroon}5 <br/>";


class Car {
  public  $model;
    function __construct(){
        $this->model = "VW";
    }
}

$haroon = new Car();
echo $haroon->model;



class MyCar{

    static $model;
    
    function __construct(){
        self::$model = "lambogin";
    }

}

$dawilly = new MyCar();
echo MyCar::$model;








$lemon = "hello Tanzania am the most used lemon Juice";

echo strtoupper($lemon);
echo strtolower($lemon);
echo "<br><br>";
echo str_replace("Tanzania", "Uganda",$lemon);

$om = "The orange juice is the most used Orange";
$fixed = explode(" ",$om);
print_r($fixed);




//String concatenation

$rombo = "This is kilimanjaro most likely to be beautiful";
$same = "na hii ipo manispaa ya Moshi Mjini";


$tolat = $rombo . $same ;

echo $tolat;

echo "<br/>";



echo PHP_INT_MAX;
echo PHP_INT_MIN;
echo PHP_INT_SIZE;

echo "<br/>";


$number = 54673;
var_dump(is_int($number)); 
echo "<br/>";
echo is_int($number);

echo "<br/>";
$x = 56473;
var_dump(is_numeric($x));

echo "<br/>";
$x = "56473";
var_dump(is_numeric($x));

echo "<br/>";
$x = "101" + 100;
echo $x;
echo "<br/>";
var_dump(is_numeric($x));
$x = "Hello";
echo "<br/>";
var_dump(is_numeric($x));
 




?>