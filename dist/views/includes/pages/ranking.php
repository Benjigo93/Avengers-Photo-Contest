<?php
    
    require '../settings/errors.php';
    require '../settings/config.php';
    require '../settings/database.php';
    require '../settings/rankProcess.php';

    //echo '<pre>';
    //print_r($get_ranking);
    //echo '</pre>'; 

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Ranking</title>
</head>
<body>
    <div id="ranking">
        <?php if(!$_SERVER["QUERY_STRING"]==null){ ?>
        <div id="friendRank">
            <?php for($i=0;$i<count($get_ranking);$i++){
                    if($_SERVER["QUERY_STRING"]==$get_ranking[$i]->{'team_name'}){
                        $friend_rank = $i;} ?>
            <?php } ?>
            <?php if(isset($friend_rank)){ ?>
            <div id="friendBoard">
            <h4> Your Friend Board </h4>
                <span> <?= $friend_rank ?> </span>
                <span> <?= $get_ranking[$friend_rank]->{'team_name'} ?> </span>
                <div>
                    <?php for($i=1;$i<=$get_ranking[$friend_rank]->{'character_number'};$i++){?> 
                        <div class="heroePic" style="background-image:url(../../../assets/<?= $get_ranking[$friend_rank]->{'url_hero_'.$i} ?>.jpg);"></div>
                    <?php } ?>
                </div>       
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <div id="allRank">
        <h4> High Score </h4>
        <?php for($i=0;$i<count($get_ranking);$i++){ ?>
            <div id="teamRank<?= $i ?>">
                <span> <?= $i ?> </span>
                <span> <?= $get_ranking[$i]->{'team_name'} ?> </span>
                <span> <?= $get_ranking[$i]->votes ?> votes </span>
                <a href="../settings/rankProcess.php?rankId=<?= $get_ranking[$i]->id ?>&vote=<?= $get_ranking[$i]->votes ?>">+1</a>
                <a href="../settings/reportProcess.php?rankId=<?= $get_ranking[$i]->id ?>&report=<?= $get_ranking[$i]->reports ?>">report</a>
                <button type="button" class="click" data-link="http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/ranking.php?<?= $get_ranking[$i]->{'team_name'} ?>">share</button>
                <input type="text" class="yes" value="http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/ranking.php?<?= $get_ranking[$i]->{'team_name'} ?>" readonly></input>
                <div>
                    <?php for($j=1;$j<=$get_ranking[$i]->{'character_number'};$j++){?> 
                    <div class="heroePic" style="background-image:url(../../../assets/<?= $get_ranking[$i]->{'url_hero_'.$j} ?>.jpg);"></div>
                    <?php } ?>  
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <script src="../../../scripts/main.js"></script>
</body>
</html>