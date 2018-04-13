<?php
//     if the form is sent

    if(!empty($_POST))
    {
		$errorMessages = [];
		$team_name = trim($_POST['team_name']);
		$team_id = md5($team_name);
        $mail_address = trim($_POST['mail_address']);

		if(empty($_POST['team_name'])){
			$errorMessages[] = 'Please enter a valid Name';
		}
		if(empty($_POST['hero_ids'])){
			$errorMessages[] = 'Please choose at least one character';
		}
		if(empty(trim($_POST['mail_address']))){
			$errorMessages[] = 'Please enter an email';
		}
		else if(!filter_var(trim($_POST['mail_address']), FILTER_VALIDATE_EMAIL)){
			$errorMessages[] = 'Please enter a valid email';
		}
		function clean($string) {
		$string = str_replace(' ', '-', $string); 
		
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
		}
        $query_name = $pdo->query('SELECT * FROM rankings WHERE team_name = \''.clean($team_name).'\'');
		$user_name = $query_name->fetchAll(); 
		$query_mail = $pdo->query('SELECT * FROM rankings WHERE mail_address = \''.$mail_address.'\'');
		$user_mail = $query_mail->fetchAll();
		
		if(!empty($user_name)){
			$errorMessages[] = 'user name already taken';
		}
		if(!empty($user_mail)){
			$errorMessages[] = 'mail address already taken';
		}
	
				
    	// if there are no errors
        if(empty($errorMessages))
        {
		// get the data
		$hero_ids = $_POST['hero_ids'];
		$character_number = count($hero_ids);
//		Prepare variables for query
		$id_hero_1=0;
		$id_hero_2=0;
		$id_hero_3=0;
		$id_hero_4=0;
		$id_hero_5=0;
		$url_hero_1 = 0;
		$url_hero_2 = 0;
		$url_hero_3 = 0;
		$url_hero_4 = 0;
		$url_hero_5 = 0;
		for($j=1;$j<=count($hero_ids);$j++){
			${"id_hero_$j"} = $hero_ids[$j-1];
			${"url_hero_$j"} = 'images/sheroe'.$hero_ids[$j-1].'.jpg';
		}
		$reports = 0;
		$votes = 0;
		$validated = 0;
		
//			 Pdo query to insert values into database
			$prepare =$pdo->prepare('
				INSERT INTO 
					rankings
					(
					team_name,
					team_id,
					character_number,
					mail_address,
					id_hero_1,
					id_hero_2,
					id_hero_3,
					id_hero_4,
					id_hero_5,
					url_hero_1,
					url_hero_2,
					url_hero_3,
					url_hero_4,
					url_hero_5,
					reports,
					votes,
					validated
					)
				VALUES
					(
					:team_name,
					:team_id,
					:character_number,
					:mail_address,
					:id_hero_1,
					:id_hero_2,
					:id_hero_3,
					:id_hero_4,
					:id_hero_5,
					:url_hero_1,
					:url_hero_2,
					:url_hero_3,
					:url_hero_4,
					:url_hero_5,
					:reports,
					:votes,
					:validated
					)
			');
			$prepare->bindValue(':team_name', $team_name);
			$prepare->bindValue(':team_id', $team_id);
			$prepare->bindValue(':character_number', $character_number);
			$prepare->bindValue(':mail_address', $mail_address);
			$prepare->bindValue(':id_hero_1', $id_hero_1);
			$prepare->bindValue(':id_hero_2', $id_hero_2);
			$prepare->bindValue(':id_hero_3', $id_hero_3);
			$prepare->bindValue(':id_hero_4', $id_hero_4);
			$prepare->bindValue(':id_hero_5', $id_hero_5);
			$prepare->bindValue(':url_hero_1', $url_hero_1);
			$prepare->bindValue(':url_hero_2', $url_hero_2);
			$prepare->bindValue(':url_hero_3', $url_hero_3);
			$prepare->bindValue(':url_hero_4', $url_hero_4);
			$prepare->bindValue(':url_hero_5', $url_hero_5);
			$prepare->bindValue(':reports', $reports);
			$prepare->bindValue(':votes', $votes);
			$prepare->bindValue(':validated', $validated);
			$prepare->execute();
			$_POST['name'] = '';
			$_POST['mail_address'] = '';
        	$_POST['hero_ids'] = '';
        	$character_number = '';
			$errorMessages = [];
			
			
			header('Location:../pages/team-page.php?team_id='.$team_id);
		}
	}
    else
    {
			
        $_POST['name'] = '';
        $_POST['mail_address'] = '';
        $_POST['hero_ids'] = '';
        $character_number = '';
		$errorMessages = [];
    }

?>