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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Characters</title>
</head>
<body>
    <div id="desc-hero">
        <h1><?= $heroData->name; ?></h1>
        <img src="../../../assets/images/sheroe<?= $id ?>.jpg" class="picture">
        <div class="infos">
            <div>Full name: <?= $heroData->biography->{'full-name'}; ?></div>
            <div>Race: <?= $heroData->appearance->race; ?></div>
            <div>Height: <?= $heroData->appearance->height[1]; ?> /  <?= $heroData->appearance->height[0]; ?></div>
            <div>Weight: <?= $heroData->appearance->weight[1]; ?> /  <?= $heroData->appearance->weight[0]; ?></div>
            <div>Affiliations (in the comics): <?= $heroData->connections->{'group-affiliation'}; ?></div>
            <div>
                <h2>Stats</h2>
                <div>Intelligence: <?= $heroData->powerstats->intelligence; ?> %</div>
                <div>Strength: <?= $heroData->powerstats->strength; ?> %</div>
                <div>Speed: <?= $heroData->powerstats->speed; ?> %</div>
                <div>Durability: <?= $heroData->powerstats->durability; ?> %</div>
                <div>Power: <?= $heroData->powerstats->power; ?> %</div>
                <div>Combat: <?= $heroData->powerstats->combat; ?> %</div>
            </div>
        </div>
    </div>
    <script src="../../../scripts/hero.js"></script>
</body>
</html>