<?php

$locationError = false;

//Show times location
if(isset($_GET['position'])){

	//International show times api key
	$apiKey = '19dVVWTqRsDKAI0Ttto29zYsjgIQ3Xog';
	// Infinity war movie id
	$movieId = '30767';
	// show times language
	$language = 'fr';
	// GET location from url
	$location = $_GET['position'];
	//Show times location
	$distance = '5';

	//Internationnal show times url
	$url = 'https://api.internationalshowtimes.com/v4/cinemas/?apikey='.$apiKey.'&movie_id='.$movieId.'&lang='.$language.'&location='.$location.'&distance='.$distance;

	//Open Weather path to cache
	$path = '../../cache/cinemas/'.md5($url);

	// if file doesn't exist in cache, creates it, else get content from it
	if(file_exists($path) && time() - filemtime($path) < 60)
	{
		$data = file_get_contents($path);
		$data = json_decode($data);
	}
	else
	{
		$data = file_get_contents($url);
		$data = json_decode($data);
		file_put_contents($path, json_encode($data));
	}
}
else{
	$locationError = true;
}

?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="../../../styles/main.css">
		<title>Cinemas</title>
	</head>

	<body>
		<header class="header">
			<button class="cinemas">Liste des cinémas</button>
		</header>
		<div class="cinemas-container">
			<?php
			if($locationError){
				echo '<div class="errorMessage">Please accept the geolocation to see the list of cinemas</div>';
			}
			else{
				include '../settings/cinema-list.php';
			}
			?>
		</div>

		<script src="../../../scripts/cinema.js"></script>
	</body>
	</html>