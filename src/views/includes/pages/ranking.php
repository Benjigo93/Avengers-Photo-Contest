<?php
    
    require '../settings/errors.php';
    require '../settings/config.php';
    require '../settings/database.php';
    require '../settings/rankProcess.php';

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
    <title>Ranking</title>
</head>
<body>
    <div class="ranking-id">
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
    <div id="ranking">
        <div class="container">
            <div class="title">
                <h4> Score list </h4>
                <div class="line"></div>
            </div>
            <?php if(!$_SERVER["QUERY_STRING"]==null){ ?>
            <div id="friendRank">
                <?php for($i=0;$i<count($get_ranking);$i++){
                        if($_SERVER["QUERY_STRING"]==$get_ranking[$i]->{'team_name'}){
                            $friend_rank = $i;} ?>
                <?php } ?>
                <?php if(isset($friend_rank)&&$get_ranking[$friend_rank]->validated==1){ ?>
                <div id="friendBoard">
                <h4> Your Friend Board </h4>
                    <span class="rank-number"> <?= $friend_rank ?> </span>
                    <span class="team-name"> <?= $get_ranking[$friend_rank]->{'team_name'} ?> </span>
                    <span class="votes"> <?= $get_ranking[$friend_rank]->votes ?> votes </span>
                    <a href="../settings/rankProcess.php?friendName=<?= $get_ranking[$friend_rank]->{'team_name'}?>&rankId=<?= $get_ranking[$friend_rank]->id ?>&vote=<?= $get_ranking[$friend_rank]->votes ?>"><span class="add-vote">+1</span></a>
                    <a class="report" href="../settings/reportProcess.php?friendName=<?= $get_ranking[$friend_rank]->{'team_name'}?>&rankId=<?= $get_ranking[$friend_rank]->id ?>&report=<?= $get_ranking[$friend_rank]->reports ?>">report</a>
                    <button type="button" class="shareButton">share</button>
                    <input type="text" class="shareLink" value="http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/ranking.php?<?= $get_ranking[$friend_rank]->{'team_name'} ?>" readonly></input>
                    <div class="pic-align-friend">
                        <?php for($i=1;$i<=$get_ranking[$friend_rank]->{'character_number'};$i++){?> 
                            <div class="pic-container">
                                <div class="heroePic" style="background-image:url(../../../assets/<?= $get_ranking[$friend_rank]->{'url_hero_'.$i} ?>);"></div>
                            </div>
                        <?php } ?>
                    </div>       
                </div>
                <?php }else if(isset($friend_rank)&&$get_ranking[$friend_rank]->validated==0){ ?>
                    <div> The team hasn't validated his composition </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div id="allRank">
                <h4> High Score </h4>
                <?php for($i=0;$i<count($get_ranking);$i++){ 
                    if($get_ranking[$i]->validated==1){?>
                    <div id="teamRank<?= $i ?>">
                        <span class="rank-number"> <?= $i ?> </span>
                        <span class="team-name"> <?= $get_ranking[$i]->{'team_name'} ?> </span>
                        <span class="votes"> <?= $get_ranking[$i]->votes ?> votes </span>
                        <a href="../settings/rankProcess.php?rankId=<?= $get_ranking[$i]->id ?>&vote=<?= $get_ranking[$i]->votes ?>"><span class="add-vote">+1</span></a>
                        <a class="report" href="../settings/reportProcess.php?rankId=<?= $get_ranking[$i]->id ?>&report=<?= $get_ranking[$i]->reports ?>">report</a>
                        <button type="button" class="shareButton share" data-link="http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/ranking.php?<?= $get_ranking[$i]->{'team_name'} ?>">share</button>
                        <input type="text" class="shareLink" value="http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/ranking.php?<?= $get_ranking[$i]->{'team_name'} ?>" readonly></input>
                        <div class="pic-align">
                            <?php for($j=1;$j<=$get_ranking[$i]->{'character_number'};$j++){?> 
                            <div class="pic-container">
                                <div class="heroePic" style="background-image:url(../../../assets/<?= $get_ranking[$i]->{'url_hero_'.$j} ?>);"></div>
                            </div>
                            <?php } ?>  
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
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
    <script src="../../../scripts/ranking.js"></script>
</body>
</html>