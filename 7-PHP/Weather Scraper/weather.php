<?php

	$weather = "";
	$error = "";
	
	if (array_key_exists('city', $_GET)) {
		
		$city = str_replace(' ', '', $_GET['city']);
		
		$file_headers = @get_headers("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
		
		if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
			
			$error = "That city could not be found.";
			
		} else {
		
		$forecastPage = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
		
		$pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);
		
		if (sizeof($pageArray) > 1) {
		
				$secondpageArray = explode('</span></span></span>', $pageArray[1]);
				
				if (sizeof($secondpageArray) > 1) {
				
					$weather = $secondpageArray[0];
				
			} else {
				
				$error = "That city could not be found.";
				
			}
				
			} else {
				
				$error = "That city could not be found.";
			
			}
		
		}
		
	}

?>



<!DOCTYPE html>

<html lang="en">
    
  <head>
      
    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	
		<title>Weather Scraper</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
	
	<style type="text/css">
	
		body {
		
			position: relative;
			background-image: url('images/background.jpg');
		
		}
		
		.container {
		
			margin-top: 150px;
			text-align: center;
			font-size: 225%;
			
		}
		
		#weather {
			
			margin: 0 auto;
			margin-top: 15px;
			font-size: 50%;
			width: 450px;
			
		}
			
	</style>
      
  </head>
  
  <body>
	
	<div class="container">
	
			<h1 class="display-4">What's the weather?</h1>	

		<form>
		
			<fieldset class="form-group">
			
				<label class="lead">Enter the name of a city.</label>
			
				<input type="text" style="width: 400px; margin: 20px auto;" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "<?php 
	
					if (array_key_exists('city', $_GET)) {

						 echo $_GET['city'];
						 
				   }
				   
				   ?>">
			
			</fieldset>
			
			<button type="submit" style="margin-top: 30px;" class="btn btn-primary">Submit</button>
			
		</form>
		
		<div id="weather"><?php
		
			if ($weather) {
				
				echo '<div class="alert alert-success" role="alert">
				
				'.$weather.'
				
				</div>';
				
			} else if ($error){
				
				echo '<div class="alert alert-danger" role="alert">
				
				'.$error.'
				
				</div>';
				
			}
			
		?></div>
		
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>  
     
  </body>
    
</html>