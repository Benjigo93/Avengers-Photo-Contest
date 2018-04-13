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

?><!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    	<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    	<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    	<link rel="manifest" href="assets/favicon/site.webmanifest">
    	<link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    	<link rel="shortcut icon" href="assets/favicon/favicon.ico">
    	<meta name="msapplication-TileColor" content="#da532c">
    	<meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
    	<meta name="theme-color" content="#ffffff">
    	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono|Raleway" rel="stylesheet"> 
    	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    	<link href="../../../styles/reset.css" rel="stylesheet">
		<link rel="stylesheet" href="../../../styles/main.css">
		<title>Cinemas</title>
	</head>

	<body>
	<div class="cinema-div">
		<div class="header">
	        <div class="topBar">
	            <div class="line">
	                <div class="logo"></div>
	                <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../../../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription.php">Game</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cinemas" style="color:#E23636" href="#">Cinemas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="characters-list.php">Characters</a>
                        </li>
                    </ul>
	            </div>
	        </div>
		</div>
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
		<footer>
        	<div class="left">
        	    <span> © Copyright - 2018 Avengers Infinity War Contest </span>
        	    <a href="includes/pages/terms.php">Terms and Conditions</a>
        	</div>
        	<div class="right">
        	    <a href="https://www.facebook.com/avengers/">
        	        <i class="fab fa-facebook-square"></i>
        	    </a>
        	    <a href="https://twitter.com/MarvelStudios">
        	        <i class="fab fa-twitter-square"></i>
        	    </a>
        	</div>
        </footer>
	</div>
	<script src="../../../scripts/cinema.js"></script>
	</body>
	</html>