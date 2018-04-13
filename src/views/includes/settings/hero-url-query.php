<?php
$query_hero_url = $pdo->prepare("SELECT * FROM rankings WHERE team_id = :team_id AND (url_hero_1 LIKE '%sheroe%' OR url_hero_2 LIKE '%sheroe%' OR url_hero_3 LIKE '%sheroe%' OR url_hero_4 LIKE '%sheroe%' OR url_hero_5 LIKE '%sheroe%') ");
$query_hero_url->bindValue(':team_id',$team_id);
$query_hero_url->execute();
$hero_url = $query_hero_url->fetchAll(); 
?>