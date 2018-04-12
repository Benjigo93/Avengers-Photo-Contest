<?php
		$validated_query = $pdo->prepare('SELECT validated FROM rankings WHERE team_id = :team_id');
		$validated_query->bindValue(':team_id', $team_id);
		$validated_query->execute();
		$validated_bool=$validated_query->fetchAll();
		if($validated_bool[0]->validated){
			header('Location:../pages/errors/already-validated.php');
		}
?>