<?php

	$emailTo = "mrulewicz66@gmail.com";
	
	$subject = "I hope this works lol";
	
	$body = "I think you're great!";
	
	$headers = "From: dndnerd101@yahoo.com";
	
	if (mail($emailTo, $subject, $body, $headers)) {
		
		echo "The email was sent successfully";
		
	} else {
		
		echo "The email could not be sent!";
		
	}

?>
