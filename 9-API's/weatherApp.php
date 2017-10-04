<?php

	$weather = "";
	$error = "";
	
	if ($_GET['city']) {
		
		$urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",uk&appid=45b74017aef0d05a0e3662b477c311f7");
		
		$weatherArray = json_decode($urlContents, true);
		
		if ($weatherArray['cod'] == 200) {
		
			$weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";
			
			$tempInFahrenheit = intval(($weatherArray['main']['temp']* 9/5) - 459.67);
			
			$weather .= " The temperature is ".$tempInFahrenheit."&deg;F and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
			
		}	else {
			
				$error = "Could not find city - please try again.";
			
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