<?php

	include 'config.php';

	if(!empty($_GET)){
		$team_id = $_GET['team_id'];
		include 'team-query.php';
		include 'hero-url-query.php';

		if(empty($hero_url)){
			echo 'Ok!';
			$prepare = $pdo->prepare('UPDATE rankings SET  validated = 1 WHERE  team_id = :team_id');
			$prepare->bindValue(':team_id', $team_id);
			$exec = $prepare->execute();
			header('Location:../pages/team-validated.php');
		}
		else{
			header('Location:../pages/team-page.php?team_id='.$team_id.'&error=1');
		}	
	}
	else{
		echo 'error';
	}

?>
	
