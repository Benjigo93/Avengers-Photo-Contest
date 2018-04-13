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

?><!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../../../styles/main.css">
	<title>Upload your image</title>
</head>
<body>
	<div class="container-team-page">
		<div class="team-name-choose">Your team name : <span><?= $team[0]->team_name ?></span></div>
		<div class="team-link">Your team link : <div class="link"><?= $actual_link ?></div></div>
		<?php for($l=1; $l <= $team[0]->character_number; $l++){	?>
		<div class="contain-img">
			<img src="<?= $team[0]->{'url_hero_'.$l}; ?>" alt="">
			<a class="select" href="upload-page.php?team_id=<?= $team_id ?>&id_hero=<?=$l?>">Select image to upload for <?= $team[0]->{'name_'.$l} ?></a>
		</div>
		<?php }; ?>
		<a class="validate" href="../settings/team-validation.php?team_id=<?= $team_id ?>">Validate</a>
	</div>


</body>

</html>


