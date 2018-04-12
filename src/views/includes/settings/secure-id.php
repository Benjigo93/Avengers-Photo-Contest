<?php
$query_secure_id = $pdo->prepare("SELECT * FROM rankings WHERE team_id LIKE :team_id");
		$query_secure_id->bindValue(':team_id',$team_id);
		$query_secure_id->execute();
		$secure_id = $query_secure_id->fetchAll(); 
		if(empty($secure_id)){
			header('Location:../pages/errors/404.php');
		}
?>