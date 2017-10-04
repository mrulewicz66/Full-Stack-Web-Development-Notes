<?php

	/*echo md5("password");
	Level 2 encryption; one way hash; common passwords detectable via crackstation.*/
	
	$row['id'] = 73;
	
	echo md5(md5($row['id'])."password");
	
	//$salt level 3 encryption
	
	//using the $row['id'] as salt, level 4 encryption
   
?>