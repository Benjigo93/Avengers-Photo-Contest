<?php
	include '../settings/config.php';
	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if(!empty($_GET)){
		if(isset($_GET['error'])){
			$team_id = $_GET['team_id'];
			include '../settings/secure-id.php';
			include '../settings/validated-query.php';
			echo 'You must upload an image for each character';
			include '../settings/team-query.php';	
		}
		else{
		$team_id = $_GET['team_id'];
		include '../settings/secure-id.php';
		include '../settings/validated-query.php';
		include '../settings/team-query.php';
			}
		}
	else{
		echo 'error';
	}

?>
<!DOCTYPE html>

<html>

<body>
	<div>Your team name : <?= $team[0]->team_name ?></div>
	<div class="link">Your team link : <?= $actual_link ?></div>
	<?php for($l=1; $l <= $team[0]->character_number; $l++){	?>
	<img src="<?= $team[0]->{'url_hero_'.$l}; ?>" style="height:200px;width:auto"alt="">
	<a href="upload-page.php?team_id=<?= $team_id ?>&id_hero=<?=$l?>">Select image to upload for <?= $team[0]->{'name_'.$l} ?></a>
	<?php }; ?>
	<a href="../settings/team-validation.php?team_id=<?= $team_id ?>">Validate the team !</a>
</body>

</html>


