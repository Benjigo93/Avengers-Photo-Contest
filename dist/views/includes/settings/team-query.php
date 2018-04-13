<?php
	$query_team = $pdo->query('SELECT R.*, H.name as name_1, H2.name as name_2, H3.name as name_3, H4.name as name_4, H5.name as name_5 
								FROM rankings R, heroes H, heroes H2, heroes H3, heroes H4, heroes H5
								WHERE team_id = \''.$team_id.'\' 
								AND R.id_hero_1 = H.hero_id
								AND R.id_hero_2 = H2.hero_id
								AND R.id_hero_3 = H3.hero_id
								AND R.id_hero_4 = H4.hero_id
								AND R.id_hero_5 = H5.hero_id');
	$team = $query_team->fetchAll(); 
?>