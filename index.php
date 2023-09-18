<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Movieshuffle</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>

    <?php
    // Charger le contenu du fichier movies.json
    $json = file_get_contents("movies.json");

    // var_dump($json); file_get_contents nous donne une chaîne de caractères
    $movies = json_decode($json, true);
    ?>

    <?php
    include("templates/header.php");
    ?>

    <div class="movie-list">
        <div class="movie-grid">
            <?php $count = 0; ?>
            <?php foreach ($movies as $movie) { ?>
                <div class="movie">
                    <h2><?= $movie["title"] ?></h2>
                    <a href="movie.php?id=<?= $movie["id"] ?>" >
                        <img class="poster" src="../img/poster/<?= str_replace(" ","-",$movie["title"])?>.jpg" alt="<?= $movie["title"] ?>" >
                        <p><?= $movie["releaseDate"] ?></p>
                    </a>
                </div>

                <?php
                $count++;
                if ($count % 5 == 0) {
                    echo '</div><div class="movie-grid">';
                }
                ?>

            <?php } ?>
        </div>
    </div>

    <?php
    include("templates/footer.php");
    ?>



    <style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Bebas Neue', sans-serif;
}

.container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #333;
  color: #fff;
  padding: 10px;
}



h2, p, a {
    margin-left: 0px;
    font-size: 20px;
    color: white;
    text-decoration: none;
    font-family: 'Bebas Neue', sans-serif;
}

footer {
  background: white;
  color: black;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  text-align: center;
  padding: 10px;
  height: 60px;
}

.movie-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px;
            
        }

       /* Style pour le conteneur des films */
.movie {
    position: relative;
    width: 250px;
    height: 350px;
    margin: 10px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.movie:hover {
    transform: scale(1.1);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Ajoute une ombre au survol */
}

/* Style pour l'image du film */
.poster {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Style pour le titre du film */
.movie h2 {
    position: absolute; 
    bottom: 40px;
    left: 10px;
    padding: 2px;
}

/* Style pour la date de sortie du film */
.movie p {
    position: absolute;
    bottom: 10px;
    left: 10px;
    font-size: 14px;
    padding: 2px;
}

.poster img {
    transition: transform 0.3s ease;
    max-width: 100%;
    height: auto;
}


        @media (max-width: 768px) {
            .movie {
                width: 32%;
            }
        }
    </style>

</body>
</html>