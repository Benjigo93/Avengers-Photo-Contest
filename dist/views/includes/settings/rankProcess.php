<?php

    require_once '../settings/errors.php';
    require_once '../settings/config.php';
    require_once '../settings/database.php';

    if(isset($_GET['rankId'], $_GET['vote'])&&(!isset($_COOKIE['infinityWar']))){
        
        $adressIp = $_SERVER['REMOTE_ADDR'];
        setcookie('infinityWar','voted', time() + (86400 * 30), "/");
        $rankId = $_GET['rankId'];
        $vote = $_GET['vote'];

        $upVote = $pdo->prepare('UPDATE rankings SET votes = :vote WHERE id = :id');
        $upVote->bindValue(':id', $rankId);
        $upVote->bindValue(':vote', $vote+1);
        $execVote = $upVote->execute();

        if(isset($_GET['friendName'])){
            header("Location: ../pages/ranking.php?".$_GET['friendName']);
        } else {
            header("Location: ../pages/ranking.php");
        }

    } else {
        if(isset($_GET['rankId'], $_GET['vote'])){
        header("Location: ../pages/errors/already-voted.php");
        }
    }

?>