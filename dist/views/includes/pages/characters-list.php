<?php

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

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../styles/lib/reset.css">
    <link rel="stylesheet" href="../../../styles/lib/bootstrap.min.css">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Characters</title>
</head>
<body>
    <div id="char-list">
        <div class="container">
            <div class="title">
                <h1>Heroes of Infinity War</h1>
                <div class="line"></div>
                <p>(Click on a hero to see his informations)</p>
                <!-- <div class="search-container">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Hulk" name="search">
                        <button type="submit"><img src="../../../assets/images/search.svg" alt="search"></button>
                    </form>
                </div> -->
            </div>
            <?php for($i = 0; $i<count($heroesId); $i++){ ?>
            <a href="hero.php?shId=<?=$heroesId[$i]?>">
                <div style="background-image:url(../../../assets/images/sheroe<?= $heroesId[$i] ?>.jpg);" class="hero">
                    <div class="text-container">
                        <h2> <?= $data[$i]->name ?></h2>
                        <?php if(!$data[$i]->biography->{'full-name'}==null){?> <span>FULL-NAME : <?= $data[$i]->biography->{'full-name'} ?></span> <?php }?><br/>
                        <span>RACE : <?= $data[$i]->appearance->race; ?></span><br/>
                        <span class="more">Click to see more<br/>
                    </div>
                </div>
            </a>
            <?php }?>
        </div>
        </a>
        <?php }?>
    </div>
</body>
</html>