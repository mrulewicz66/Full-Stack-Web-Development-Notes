<?php

	require "twitteroauth/autoload.php";

	use Abraham\TwitterOAuth\TwitterOAuth;
	
	$consumerkey = 	"JDZ8UrTrYHbM4Y5vEwjzI2kPJ";
	
	$consumersecret = "Um1ziv0QLfxKjltO0iS1uIfnaPIW3nZ08dG9jUA35eH9Op4PHY";
	
	$access_token = "253320911-DgwwEtQ1UThxxG4NM8Ln9RD0zgdqYCAxfWlVgNBj";
	
	$access_token_secret = "6gqPqhJ08oZDQW6xlkmIqbsDVNdy9cvSV0RWzdaSBuSld";
	
	$connection = new TwitterOAuth($consumerkey, $consumersecret, $access_token, $access_token_secret);
	$content = $connection->get("account/verify_credentials");
	
	
	
	$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
	
	foreach ($statuses as $tweet) {
		
		if ($tweet->favorite_count >= 2) {
			
			$status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
			echo $status->html;
			
		}
		
	}

?>