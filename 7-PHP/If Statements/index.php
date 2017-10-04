<?php

$user = "mike";

if ($user == "mike") {
	
	echo "Hello Mike!";
	
} else {
	
	echo "I don't know you";
	
}

echo "<br><br>";

$age = 16;

if ($age >= 18 || $user == "mike") {
	
	echo "You may enter...";
	
} else {
	
	echo "Oops, too young! Sorry!";
	
}

?>