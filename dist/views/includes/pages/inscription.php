<?php

include '../settings/config.php';
include '../settings/form_inscription.php';

$heroesId = ['149','346','226','332','659','107','620','106','579','697','703','251','714','630','234','275','566','303','487','431'];

for($i = 0; $i<count($heroesId); $i++){
    ini_set('max_execution_time', 300);
    $apiKey = '1741355745903622/';
    $apiUrl = 'http://superheroapi.com/api/'.$apiKey.$heroesId[$i];

    $path = "../../cache/superheroes/".md5($apiUrl);

    if(file_exists($path) && time() - filemtime($path) < 86400){
        $data[$i] = file_get_contents($path);
        $data[$i] = json_decode($data[$i]);
    } else {
        $data[$i] = file_get_contents($apiUrl);
        $data[$i] = json_decode($data[$i]);
        file_put_contents($path, json_encode($data[$i]));
    }

}

?>
	<!DOCTYPE html>


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
		<title>Registration</title>
	</head>

	<body>
		<div class="registration">
			<div class="header">
	    	    <div class="topBar">
	    	        <div class="line">
	    	            <div class="logo"></div>
	    	            <ul class="nav">
        	                <li class="nav-item">
        	                    <a class="nav-link" href="../../../index.php">Home</a>
        	                </li>
        	                <li class="nav-item">
        	                    <a class="nav-link" style="color:#E23636" href="inscription.php">Game</a>
        	                </li>
        	                <li class="nav-item">
        	                    <a class="nav-link cinemas" href="#">Cinemas</a>
        	                </li>
        	                <li class="nav-item">
        	                    <a class="nav-link" href="characters-list.php">Characters</a>
        	                </li>
        	            </ul>
	    	        </div>
	    	    </div>
			</div>
		<div id="inscription-container">
			<form action="#" method="post">
				<input type="text" name="team_name" class="team-name" placeholder="team name">
				<input type="text" name="mail_address" class="email" placeholder="Your email">
				<?php foreach($heroesId as $key=>$heroId): ?>
					<input class='checkbox-limit' style="background-image: url(../../../assets/images/sheroe<?= $heroId ?>.jpg);" data-name='<?= $data[$key]->name ?>' type='checkbox' name='hero_ids[]' value='<?= $heroId ?>' id="<?= $heroId ?>" />
					<label style="background-image: url(../../../assets/images/sheroe<?= $heroId ?>.jpg)" for="<?= $heroId ?>"></label>
					<?php endforeach; ?>
						<input type="submit" class="submit-team" value="Valider la team">
			</form>

			<?php foreach($errorMessages as $message): ?>
				<p style="color: red;">
					<?= $message ?>
				</p>
				<?php endforeach; ?>
					<div class="selected-hero"></div>
					<script src="../../../scripts/registration.js"></script>
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