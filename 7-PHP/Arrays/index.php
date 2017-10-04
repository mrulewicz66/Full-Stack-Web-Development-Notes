<?php

$myArray = array("Mike", "Connor", "Holden");

$myArray[] = "Katie";

print_r($myArray);

echo $myArray[1];

echo "<br><br>";

$anotherArray[0] = "pizza";

$anotherArray[1] = "yoghurt";

$anotherArray[5] = "coffee";

$anotherArray["myFavoriteFood"] = "ice cream";

print_r($anotherArray);

echo "<br><br>";

$thirdArray = array(
	"France" => "French",
	"USA" => "English",
	"Germany" => "German");
 
 unset($thirdArray["France"]);

print_r($thirdArray);

echo sizeof($thirdArray);



?>