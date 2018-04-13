<?php

	include '../settings/config.php';

	if(!empty($_GET)){
		$team_id = $_GET['team_id'];
		$validated_query = $pdo->prepare('SELECT validated FROM rankings WHERE team_id = :team_id');
		$validated_query->bindValue(':team_id', $team_id);
		$validated_query->execute();
		$validated_bool=$validated_query->fetchAll();
		if($validated_bool[0]->validated){
			header('Location: errors/already-validated.php');
		}	
		$query_secure_id = $pdo->prepare("SELECT * FROM rankings WHERE team_id LIKE :team_id");
		$query_secure_id->bindValue(':team_id',$team_id);
		$query_secure_id->execute();
		$secure_id = $query_secure_id->fetchAll(); 
		if(empty($secure_id)){
			header('Location: errors/404.php');
		}


		$id_hero = $_GET['id_hero'];
		$query_team = $pdo->query('SELECT R.*, H.name as name_1, H2.name as name_2, H3.name as name_3, H4.name as name_4, H5.name as name_5 
									FROM rankings R, heroes H, heroes H2, heroes H3, heroes H4, heroes H5
									WHERE team_id = \''.$team_id.'\' 
									AND R.id_hero_1 = H.hero_id
									AND R.id_hero_2 = H2.hero_id
									AND R.id_hero_3 = H3.hero_id
									AND R.id_hero_4 = H4.hero_id
									AND R.id_hero_5 = H5.hero_id');
		$team = $query_team->fetchAll(); 
	if(!empty($_POST["submit"])) {

		function clean($string) {
			$string = str_replace(' ', '-', $string); 

			return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
		}
		$team_directory_name =clean($team[0]->team_name);

		if (!file_exists("../../../assets/images/uploads/".$team_directory_name."/")) {
	    mkdir("../../../assets/images/uploads/".$team_directory_name."/", 0777, true);
		}
		$target_dir = "../../../assets/images/uploads/".$team_directory_name."/";

		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
		if(!empty($_FILES['fileToUpload']["name"])){
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 2000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
	    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

			$prepare = $pdo->prepare('UPDATE rankings SET  url_hero_'. $id_hero .' = :new_url WHERE  team_id = :team_id');
			// Bind les valeurs
			$prepare->bindValue(':new_url', $target_file);
			$prepare->bindValue(':team_id', $team_id);

			// Execute la requête
			echo '<pre>';
			var_dump($exec = $prepare->execute());
			echo '</pre>';
			header('Location: team-page.php?team_id='.$team_id);
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
		}
		else {
			echo 'Please upload an image ';
		}
	}


	}
?>
	
	


<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="assets/favicon/site.webmanifest">
	<link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="assets/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono|Raleway" rel="stylesheet"> 
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
	<link href="../../../styles/reset.css" rel="stylesheet">
	<link rel="stylesheet" href="../../../styles/main.css">
	<title>Registration</title>
</head>
<body>
<div class="registration">
		<div class="header">
	        <div class="topBar">
	            <div class="line">
	                <div class="logo"></div>
	                <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../../../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription.php">Game</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cinemas" href="#">Cinemas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="characters-list.php">Characters</a>
                        </li>
                    </ul>
	            </div>
	        </div>
		</div>
		<img style='height:200px;width:auto' src="<?=$team[0]->{'url_hero_'.$id_hero}; ?>" alt="">
		<form action="#" method="post" enctype="multipart/form-data">
   		 Select image to upload :
    	<input type="file" name="fileToUpload" id="fileToUpload">
    	<input type="submit" value="Upload Image" name="submit">
		</form>
		<footer>
        	<div class="left">
        	    <span> © Copyright - 2018 Avengers Infinity War Contest </span>
        	    <a href="includes/pages/terms.php">Terms and Conditions</a>
        	</div>
        	<div class="right">
        	    <a href="https://www.facebook.com/avengers/">
        	        <i class="fab fa-facebook-square"></i>
        	    </a>
        	    <a href="https://twitter.com/MarvelStudios">
        	        <i class="fab fa-twitter-square"></i>
        	    </a>
        	</div>
        </footer>
    </div>
    <script src="../../../scripts/cinema.js"></script>
</body>

</html>