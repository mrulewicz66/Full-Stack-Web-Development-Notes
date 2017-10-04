<?php

	mysqli_connect("localhost", "cl13-users-dxx", "nm!4zx-4!");
	
	if (mysqli_connect_error()) {
		
		echo "There was an error connecting to the database";
		
	} else {
		
		echo "Database connection successful";
		
	}
	
		

?>