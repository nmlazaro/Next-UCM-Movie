<?php

const API_URL = "https://whenisthenextmcufilm.com/api";


//ch = curl handler
$ch = curl_init(API_URL);
//To not show the petition in the website
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Stops SSL HTTPS protocol
$response = curl_exec($ch);
//$response = file_get_contents(API_URL); // If only a GET




$data = json_decode($response, true); //True for an assosiative array


// var_dump($data);
?>

<head>
    <meta charset="UTF-8">
    <title>Next Marvel Movie</title>
    <link rel="stylesheet" href="styles.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <hgroup>
        <h2>
            <?= $data["title"]; ?>
        </h2>
        <h3>
            Release Date: <?= $data["release_date"]; ?>
        </h3>
        <p>Days left: <?= $data["days_until"]; ?></p>
        <p><?= $data["overview"]; ?></p>
    </hgroup>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="<?= $data["title"]; ?>">
    </section>
</main>