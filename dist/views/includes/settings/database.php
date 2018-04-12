<?php

    $get_query = $pdo->query('SELECT * FROM rankings ORDER BY votes DESC');
    $get_ranking = $get_query->fetchAll();

?>