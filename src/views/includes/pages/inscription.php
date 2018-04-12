<?php

include '../settings/config.php';
include '../settings/form_inscription.php';

$heroesId = ['149','346','226','332','659','107','620','106','579','697','703','251','714','630','234','275','566','303','487','431'];

for($i = 0; $i<count($heroesId); $i++){
    ini_set('max_execution_time', 300);
    $apiKey = '1741355745903622/';
    $apiUrl = 'http://superheroapi.com/api/'.$apiKey.$heroesId[$i];

    $path = "../../cache/superheroes/".md5($apiUrl);

    if(file_exists($path) && time() - filemtime($path) < 86400){
        $data[$i] = file_get_contents($path);
        $data[$i] = json_decode($data[$i]);
    } else {
        $data[$i] = file_get_contents($apiUrl);
        $data[$i] = json_decode($data[$i]);
        file_put_contents($path, json_encode($data[$i]));
    }

}

?>
	<!DOCTYPE html>


	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="../../../styles/main.css">
	</head>

	<body>
		<div id="inscription-container">
			<div class="title">
                <h4>Registration</h4>
                <div class="line"></div>
            </div>
			<form action="#" method="post">
				<input type="text" name="team_name" placeholder="Team name" class="team-name">
				<input type="text" name="mail_address" placeholder="Your email" class="email"><br/>
				<?php foreach($errorMessages as $message): ?>
					<p style="color: red;">
						<?= $message ?>
					</p>
				<?php endforeach; ?>
				<div class="title">
            	    <h4>Characters Selection</h4>
					<span>Choose up to 5 heroes</span>
            	    <div class="line"></div>
            	</div>
				<div class="selected-hero"></div>
				<?php foreach($heroesId as $key=>$heroId): ?>
					<input class='checkbox-limit' style="background-image: url(../../../assets/images/sheroe<?= $heroId ?>.jpg);" data-name='<?= $data[$key]->name ?>' type='checkbox' name='hero_ids[]' value='<?= $heroId ?>' id="<?= $heroId ?>" />
					<label style="background-image: url(../../../assets/images/sheroe<?= $heroId ?>.jpg)" for="<?= $heroId ?>"></label>
				<?php endforeach; ?>
				<input type="submit" value="Sumbit Team" class="submit-team">
			</form>
					<script src="../../../scripts/registration.js"></script>
			</div>
		</body>
	</html>