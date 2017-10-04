<?php
	
	if ($_GET['city']) {
		
		$forecastPage = file_get_contents("http://www.weather-forecast.com/locations/Chicago/forecasts/latest");
		
		$pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);
		
		echo $pageArray[1];
		
	}

?>

<!DOCTYPE html>

<html lang="en">
    
  <head>
  
	<title>Weather Scraper</title>
      
    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
	
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">
	
		body {
		
			position: relative;
			background-image: url('images/background.jpg');
		
		}
		
		#one {
		
			margin-top: 150px;
			text-align: center;
			font-size: 225%;
			
		}
		
		.alert {
			
			display: none;
			
		}
			
	</style>
      
  </head>
  
  <body>
	
	<div id="one">
	
			<h1 class="display-4">What's the weather?</h1>	

		<form>
		
			<fieldset class="form-group">
			
				<label class="lead">Enter the name of a city.</label>
			
				<input type="text" style="width: 400px; margin: 20px auto;" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo">
			
				<button type="submit" style="margin-top: 30px;" class="btn btn-primary">Submit</button>
			
			</fieldset>
			
			<div class="alert alert-success" style="width: 400px">
				<p></p>
			</div>

			<div class="alert alert-danger" style="width: 400px">
				<strong>Query Failed</strong> Looks like something went wrong!
			</div>
			
		</form>
		
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>   
     
  </body>
    
</html>