<?php

$find = false;
$data = array("title" => "film introuvable");


if (isset($_GET["id"])) {
    $json = file_get_contents("movies.json");
    $movies = json_decode($json, true);

    foreach ($movies as $movie) {
        if ($movie["id"] == $_GET["id"]) {
            $find = true;
            $data = $movie;
        }
    }
}
$date = strtotime($data["releaseDate"]);

include("templates/header.php");
?>

<div class="container">
    <div class="poster">
        <img src="img/poster/<?= str_replace(" ", "-", $data["title"]) ?>.jpg" alt="<?= $data["title"] ?>">
    </div>

    <div class="movie-info">
        <p> <?= date("Y",$date) ?> </p>
        <h1> <?= $data["title"] ?> </h1>
        <p> <?= $data["description"] ?> </p>
        <p> <?= implode(", ", $data["genres"]) ?> </p>
        <p> 
            <?= floor($data["duration"]/60)?>h 
            <?= $data["duration"]%60?>min
            - <?= date("d/m/Y") ?> 
        </p>

        <p><a href="<?=$data["video"] ?>" target="_blank">Bande annonce</a></p>
    </div>
</div>

<?php
include("templates/footer.php");

?>