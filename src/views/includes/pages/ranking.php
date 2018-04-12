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
            <?php if(isset($friend_rank)&&$get_ranking[$friend_rank]->validated==1){ ?>
            <div id="friendBoard">
            <h4> Your Friend Board </h4>
                <span> <?= $friend_rank ?> </span>
                <span> <?= $get_ranking[$friend_rank]->{'team_name'} ?> </span>
                <span> <?= $get_ranking[$friend_rank]->votes ?> votes </span>
                <a href="../settings/rankProcess.php?friendName=<?= $get_ranking[$friend_rank]->{'team_name'}?>&rankId=<?= $get_ranking[$friend_rank]->id ?>&vote=<?= $get_ranking[$friend_rank]->votes ?>">+1</a>
                <a href="../settings/reportProcess.php?friendName=<?= $get_ranking[$friend_rank]->{'team_name'}?>&rankId=<?= $get_ranking[$friend_rank]->id ?>&report=<?= $get_ranking[$friend_rank]->reports ?>">report</a>
                <button type="button" class="shareButton">share</button>
                <input type="text" class="shareLink" value="http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/ranking.php?<?= $get_ranking[$friend_rank]->{'team_name'} ?>" readonly></input>
                <div>
                    <?php for($i=1;$i<=$get_ranking[$friend_rank]->{'character_number'};$i++){?> 
                        <div class="heroePic" style="background-image:url(../../../assets/<?= $get_ranking[$friend_rank]->{'url_hero_'.$i} ?>.jpg);"></div>
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
                <span> <?= $i ?> </span>
                <span> <?= $get_ranking[$i]->{'team_name'} ?> </span>
                <span> <?= $get_ranking[$i]->votes ?> votes </span>
                <a href="../settings/rankProcess.php?rankId=<?= $get_ranking[$i]->id ?>&vote=<?= $get_ranking[$i]->votes ?>">+1</a>
                <a href="../settings/reportProcess.php?rankId=<?= $get_ranking[$i]->id ?>&report=<?= $get_ranking[$i]->reports ?>">report</a>
                <button type="button" class="shareButton" data-link="http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/ranking.php?<?= $get_ranking[$i]->{'team_name'} ?>">share</button>
                <input type="text" class="shareLink" value="http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/ranking.php?<?= $get_ranking[$i]->{'team_name'} ?>" readonly></input>
                <div>
                    <?php for($j=1;$j<=$get_ranking[$i]->{'character_number'};$j++){?> 
                    <div class="heroePic" style="background-image:url(../../../assets/<?= $get_ranking[$i]->{'url_hero_'.$j} ?>.jpg);"></div>
                    <?php } ?>  
                </div>
            <?php } ?>
            </div>
            <?php } ?>
        <?php } ?>
        </div>
    </div>
    <script src="../../../scripts/ranking.js"></script>
</body>
</html>