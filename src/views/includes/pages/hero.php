<?php

if(isset($_GET['shId'])) {
    $id = $_GET['shId'];
    $apiKey = '1741355745903622';
    $apiUrl = 'http://www.superheroapi.com/api/'.$apiKey.'/'.$id;
    
    $path = '../../cache/superheroes'.md5($apiUrl);

    if(file_exists($path) && time() - filemtime($path) < 86400)
    {
        $heroData = json_decode(file_get_contents($path));
    }
    else
    {
        $heroData = json_decode(file_get_contents($apiUrl));
        file_put_contents($path, json_encode($heroData));
    }
}

    // echo '<pre>';
    // print_r($heroData);
    // echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title><?= $heroData->name; ?></title>
</head>
<body>
    <div id="desc-hero">
        <a href="characters-list.php" class="back-button">All heroes</a>
        <h1><?= $heroData->name; ?></h1>
        <div class="part-1">
            <img src="../../../assets/images/sheroe<?= $id ?>.jpg" class="picture">
            <div class="infos">
                <div>FULL NAME : <?= $heroData->biography->{'full-name'}; ?></div>
                <div>RACE : <?= $heroData->appearance->race; ?></div>
                <div>HEIGHT : <?= $heroData->appearance->height[1]; ?> /  <?= $heroData->appearance->height[0]; ?></div>
                <div>WEIGHT : <?= $heroData->appearance->weight[1]; ?> /  <?= $heroData->appearance->weight[0]; ?></div>
                <div>AFFILIATIONS (COMICS): <?= $heroData->connections->{'group-affiliation'}; ?></div>
            </div>
        </div>
        <div class="part-2">
            <h2>Characteristics</h2>
            <div>INTELLIGENCE: <?= $heroData->powerstats->intelligence; ?> %</div>
            <div>STRENGTH: <?= $heroData->powerstats->strength; ?> %</div>
            <div>SPEED: <?= $heroData->powerstats->speed; ?> %</div>
            <div>DURABILITY: <?= $heroData->powerstats->durability; ?> %</div>
            <div>POWER: <?= $heroData->powerstats->power; ?> %</div>
            <div>COMBAT: <?= $heroData->powerstats->combat; ?> %</div>
        </div>
    </div>
</body>
</html>