<?php
	include '../settings/config.php';
	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if(!empty($_GET)){
		if(isset($_GET['error'])){
			$team_id = $_GET['team_id'];
			include '../settings/secure-id.php';
			include '../settings/validated-query.php';
			echo 'You must upload an image for each character';
			include '../settings/team-query.php';	
		}
		else{
		$team_id = $_GET['team_id'];
		include '../settings/secure-id.php';
		include '../settings/validated-query.php';
		include '../settings/team-query.php';
			}
		}
	else{
		echo 'error';
	}

?>
<!DOCTYPE html>

<html>
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
                            <a class="nav-link" href="inscription.php">Game</a>
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
	<div class="container-team-page">
	<div>Your team name : <?= $team[0]->team_name ?></div>
	<div class="link">Your team link : <?= $actual_link ?></div>
	<?php for($l=1; $l <= $team[0]->character_number; $l++){	?>
	<img src="<?= $team[0]->{'url_hero_'.$l}; ?>" style="height:200px;width:auto"alt="">
	<a href="upload-page.php?team_id=<?= $team_id ?>&id_hero=<?=$l?>">Select image to upload for <?= $team[0]->{'name_'.$l} ?></a>
	<?php }; ?>
	<a class="validate" href="../settings/team-validation.php?team_id=<?= $team_id ?>">Validate the team !</a>
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


