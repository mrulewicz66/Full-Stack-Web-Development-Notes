<?php

	$emailTo = "";
	
	$subject = "I hope this works lol";
	
	$body = "I think you're great!";
	
	$headers = "From: ";
	
	if (mail($emailTo, $subject, $body, $headers)) {
		
		echo "The email was sent successfully";
		
	} else {
		
		echo "The email could not be sent!";
		
	}

?>
