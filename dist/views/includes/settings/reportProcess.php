<?php

    require_once '../settings/errors.php';
    require_once '../settings/config.php';
    require_once '../settings/database.php';

    if(isset($_GET['rankId'], $_GET['report'])){

        $rankId = $_GET['rankId'];
        $report = $_GET['report'];

        $upReport = $pdo->prepare('UPDATE rankings SET reports = :report WHERE id = :id');
        $upReport->bindValue(':id', $rankId);
        $upReport->bindValue(':report', $report+1);
        $execReport = $upReport->execute();

        if(isset($_GET['friendName'])){
            header("Location: ../pages/ranking.php?".$_GET['friendName']);
        } else {
            header("Location: ../pages/ranking.php");
        }

    }

?>