<?php
    require_once '../settings/config.php';

    $get_query = $pdo->query('SELECT * FROM rankings ORDER BY votes DESC');
    $get_ranking = $get_query->fetchAll();

    $get_query2 = $pdo->query('SELECT * FROM ip');
    $get_Ip = $get_query2->fetchAll();

    //echo '<pre>';
    //echo print_r($get_Ip);
    //echo '</pre>';

?>