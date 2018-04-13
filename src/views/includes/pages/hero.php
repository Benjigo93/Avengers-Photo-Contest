<?php

    require '../settings/config.php';

    $get_img = $pdo->query('SELECT id_hero_1,id_hero_2,id_hero_3,id_hero_4,id_hero_5,character_number,url_hero_1,url_hero_2,url_hero_3,url_hero_4,url_hero_5,votes,validated FROM rankings WHERE validated = 1 ORDER BY votes DESC ');
    $get_images = $get_img->fetchAll();

    if(isset($_GET['shId'])) {
        $id = $_GET['shId'];
        $apiKey = '1741355745903622';
        $apiUrl = 'http://www.superheroapi.com/api/'.$apiKey.'/'.$id;

        $path = '../../cache/superheroes/'.md5($apiUrl);

        if(file_exists($path) && time() - filemtime($path) < 86400)
        {
            $heroData = json_decode(file_get_contents($path));
        }
        else
        {
            $heroData = json_decode(file_get_contents($apiUrl));
            file_put_contents($path, json_encode($heroData));
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
    <title><?= $heroData->name; ?></title>
</head>
<body>
    <div id="desc-hero">
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
                            <a class="nav-link" style="color:#E23636" href="characters-list.php">Characters</a>
                        </li>
                    </ul>
	            </div>
	        </div>
		</div>
        <a href="characters-list.php" class="back-button"><i class="fas fa-angle-left"></i>All heroes</a>
        <div class="title">
            <h1><?= $heroData->name; ?></h1>
            <div class="line"></div>
        </div>
        <div class="part-1">
            <img src="../../../assets/images/sheroe<?= $id ?>.jpg" class="picture">
            <div class="infos">
                <div><span class="infos-type">FULL NAME :</span> <?= $heroData->biography->{'full-name'}; ?></div>
                <div><span class="infos-type">RACE :</span> <?= $heroData->appearance->race; ?></div>
                <div><span class="infos-type">HEIGHT :</span> <?= $heroData->appearance->height[1]; ?> /  <?= $heroData->appearance->height[0]; ?></div>
                <div><span class="infos-type">WEIGHT :</span> <?= $heroData->appearance->weight[1]; ?> /  <?= $heroData->appearance->weight[0]; ?></div>
                <div><span class="infos-type">AFFILIATIONS (COMICS):</span> <?= $heroData->connections->{'group-affiliation'}; ?></div>
            </div>
        </div>
        <div class="part-2">
            <?php 
                foreach ($get_images as $image){
                    for($a=1; $a <= $image->character_number; $a++){	
                        if($image->{'id_hero_'.$a} == $id){
                            $url_temp = $image->{'url_hero_'.$a};
                            ?><img src="<?= $url_temp ?>" style="height:200px;" alt=""><?php
                        }
                    }
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
    <script src="../../../scripts/hero.js"></script>
</body>
</html>