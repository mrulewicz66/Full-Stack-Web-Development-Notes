<?php

$family = array("Mike", "Connor", "Holden", "Kaitlin");

for ($i = 0; $i < sizeof($family); $i++) {
	
	echo $family[$i]."<br>";
	
}

echo "<br><br>";

foreach ($family as $key => $value) {
	
	echo "Array item ".$key." is ".$value;
	
	echo " McKinley "."<br>";
	
}

echo "<br><br>";

for ($i = 2; $i <= 30; $i = $i + 2) {
	
	echo $i."<br>";
	
}

echo "<br><br>";

for ($i = 10; $i >= 0; $i--) {
	
	echo $i."<br>";
	
}
	


?>