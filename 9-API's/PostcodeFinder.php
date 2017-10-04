

<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Post Code Finder</title>
    <!-- Bootstrap CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  
  <body>
  
	<div class="container">
		<h1>Postcode Finder</h1>
		<p> Enter a partial address to get the postcode.</p>
		<div id="message"></div>
	<form>
		<div class="form-group">
		<label for="address">Address</label>
		<input type="text" class="form-control" id="address" placeholder="Enter partial address">
		</div>
		
		<button class="btn btn-primary" id="find_postcode">Submit</button>
	</form>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		
		$("#find_postcode").click(function(e){
			
			e.preventDefault();
		
			$.ajax({
				url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=AIzaSyAcPTydIW-Lpomk-2xZnpHqgGgTeOyF-9A",
				type: "GET",
				success: function (data) {
					
					console.log(data);
					
					if (data["status"] != "OK") {
						
						$("#message").html('<div class="alert alert-warning" role="alert">Postcode could not be found - please try again.</div>');
						
					} else {
					
						$.each(data["results"][0]["address_components"], function(key, value) {
							
							if (value["types"][0] == "postal_code") {
								
								$("#message").html('<div class="alert alert-success" role="alert"><strong>Postcode found!</strong> The postcode is ' + value["long_name"] + '.</div>');
								
								(value["long_name"]);
								
							}
							
						})
					
					}
					
				}
				
			})
			
		})
		
	</script>
	
  </body>
  
</html>