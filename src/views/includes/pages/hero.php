<?php

if(isset($_GET['shId'])) {
    $id = $_GET['shId'];
    $apiKey = '1741355745903622';
    $apiUrl = 'http://www.superheroapi.com/api/'.$apiKey.'/'.$id;
    
    $path = '../../cache/superheroes/'.md5($apiUrl);

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
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <title><?= $heroData->name; ?></title>
</head>
<body>
    <div id="desc-hero">
        <a href="characters-list.php" class="back-button"><i class="fas fa-angle-left"></i>All heroes</a>
        <div class="title">
            <h1><?= $heroData->name; ?></h1>
            <div class="line"></div>
        </div>
        <div class="part-1">
            <img src="../../../assets/images/sheroe<?= $id ?>.jpg" class="picture">
            <div class="infos">
                <div><span class="infos-type">FULL NAME :</span> <?= $heroData->biography->{'full-name'}; ?></div>
                <div><span class="infos-type">RACE :</span> <?= $heroData->appearance->race; ?></div>
                <div><span class="infos-type">HEIGHT :</span> <?= $heroData->appearance->height[1]; ?> /  <?= $heroData->appearance->height[0]; ?></div>
                <div><span class="infos-type">WEIGHT :</span> <?= $heroData->appearance->weight[1]; ?> /  <?= $heroData->appearance->weight[0]; ?></div>
                <div><span class="infos-type">AFFILIATIONS (COMICS):</span> <?= $heroData->connections->{'group-affiliation'}; ?></div>
            </div>
        </div>
        <div class="part-2">
        </div>
    </div>

    <script src="../../../scripts/hero.js"></script>

</body>
</html>