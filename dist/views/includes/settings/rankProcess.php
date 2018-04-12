<?php

    require_once '../settings/errors.php';
    require_once '../settings/config.php';
    require_once '../settings/database.php';

    if(isset($_GET['rankId'], $_GET['vote'])){

        $rankId = $_GET['rankId'];
        $vote = $_GET['vote'];

        $upVote = $pdo->prepare('UPDATE rankings SET votes = :vote WHERE id = :id');
        $upVote->bindValue(':id', $rankId);
        $upVote->bindValue(':vote', $vote+1);
        $execVote = $upVote->execute();

    header("Location: ../pages/ranking.php");

    }

?>