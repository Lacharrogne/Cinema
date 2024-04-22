<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <form method="GET">
            <div>
                <label for="input1">Nom</label>
                <input type="text" name="titre" id="input1">
            </div>
            <br>
            <br>
            <div>
                <label for="input2">Distributor</label>
                <input type="text" name="distrib" id="input2">
            </div>
            <br>
            <br>
            <div>
                <label for="genre">Genre</label>
                <select name="genre" id="genre">
                    <option value="">Sélectionner un genre</option>
                    <option value="1" <?= ($genre == '1') ? 'selected' : '' ?>>Action</option>
                    <option value="2" <?= ($genre == '2') ? 'selected' : '' ?>>Animation</option>
                    <option value="3" <?= ($genre == '3') ? 'selected' : '' ?>>Adventure</option>
                    <option value="4" <?= ($genre == '4') ? 'selected' : '' ?>>Drama</option>
                    <option value="5" <?= ($genre == '5') ? 'selected' : '' ?>>Comedy</option>
                    <option value="6" <?= ($genre == '6') ? 'selected' : '' ?>>Mystery</option>
                    <option value="7" <?= ($genre == '7') ? 'selected' : '' ?>>Biography</option>
                    <option value="8" <?= ($genre == '8') ? 'selected' : '' ?>>Crime</option>
                    <option value="9" <?= ($genre == '9') ? 'selected' : '' ?>>Fantasy</option>
                    <option value="10" <?= ($genre == '10') ? 'selected' : '' ?>>Horror</option>
                    <option value="11" <?= ($genre == '11') ? 'selected' : '' ?>>Sci-fi</option>
                    <option value="12" <?= ($genre == '12') ? 'selected' : '' ?>>Romance</option>
                    <option value="13" <?= ($genre == '13') ? 'selected' : '' ?>>Family</option>
                    <option value="14" <?= ($genre == '14') ? 'selected' : '' ?>>Thriller</option>
                </select>
            </div>
            <br>
            <br>
            <div>
                <label for="input3">Firstname</label>
                <input type="text" name="firstname" id="input3">
            </div>
            <br>
            <br>
            <div>
                <label for="input4">Lastname</label>
                <input type="text" name="lastname" id="input4">
            </div>
            <button type="submit">envoyer</button>
        </form>
    </header>
        <div class="slider-container slider-1">
            <div class="slider">
                <img src="/img/chihiro-chinoise-ok.jpg" alt="">
                <img src="/img/indiana-jones-5-40x60-ok.jpg" alt="">
                <img src="/img/spirited-away-chinoise-ok.jpg" alt="">
                <img src="/img/totoro-2-chinoise-ok.jpg" alt="">
                <img src="/img/totoro-chinoise-ok.jpg" alt="">
                <img src="/img/57-595x841.jpeg" alt="">
                <img src="/img/Affiche_-2.jpg" alt="">
                <img src="/img/Affiche_-30.jpg" alt="">
                <img src="/img/asteroid-city-40x60-ok.jpg" alt="">
                <img src="/img/braveok.jpg" alt="">
                <img src="/img/captain-america-us-1-sheet.jpg" alt="">
                <img src="/img/iron-man-40x60-1.jpg" alt="">
                <img src="/img/jujutsu-kaiser-ok.jpg" alt="">
                <img src="/img/jurassic-world-us-1-sheet.jpg" alt="">
                <img src="/img/limbo-ok-595x750.jpg" alt="">
                <img src="/img/may-december-40x60-ok.jpg" alt="">
                <img src="/img/pirates-des-caraibes-4-us-1-sheet.jpg" alt="">
                <img src="/img/suzume-ok.jpg" alt="">
                <img src="/img/the-batman-40x60-1.jpg" alt="">
                <img src="/img/thor-us-1-sheet.jpg" alt="">
                <img src="/img/tokyo-godfathers-japonaiseok.jpg" alt="">
                <img src="/img/up-us-1-sheet-prevok.jpg" alt="">
                <img src="/img/chihiro-chinoise-ok.jpg" alt="">
            </div>
        </div>
        <div class="slider-container slider-2">
            <div class="slider">
            <img alt="" src="/img/limbo-ok-595x750.jpg">
            <img alt="" src="/img/up-us-1-sheet-prevok.jpg">
            <img alt="" src="/img/tokyo-godfathers-japonaiseok.jpg">
            <img alt="" src="/img/thor-us-1-sheet.jpg">
            <img alt="" src="/img/the-batman-40x60-1.jpg">
            <img alt="" src="/img/suzume-ok.jpg">
            <img alt="" src="/img/pirates-des-caraibes-4-us-1-sheet.jpg">
            <img alt="" src="/img/may-december-40x60-ok.jpg">
            <img alt="" src="/img/chihiro-chinoise-ok.jpg">
            <img alt="" src="/img/jurassic-world-us-1-sheet.jpg">
            <img alt="" src="/img/jujutsu-kaiser-ok.jpg">
            <img alt="" src="/img/iron-man-40x60-1.jpg">
            <img alt="" src="/img/captain-america-us-1-sheet.jpg">
            <img alt="" src="/img/braveok.jpg">
            <img alt="" src="/img/asteroid-city-40x60-ok.jpg">
            <img alt="" src="/img/Affiche_-30.jpg">
            <img alt="" src="/img/Affiche_-2.jpg">
            <img alt="" src="/img/57-595x841.jpeg">
            <img alt="" src="/img/totoro-chinoise-ok.jpg">
            <img alt="" src="/img/totoro-2-chinoise-ok.jpg">
            <img alt="" src="/img/spirited-away-chinoise-ok.jpg">
            <img alt="" src="/img/indiana-jones-5-40x60-ok.jpg">
            <img alt="" src="/img/limbo-ok-595x750.jpg">
            </div>
        </div>
<?php
include "sql.php";

$titre = isset($_GET["titre"]) ? $_GET["titre"] : '';
$genre = isset($_GET["genre"]) ? $_GET["genre"] : '';
$distrib = isset($_GET["distrib"]) ? $_GET["distrib"] : '';
$firstname = isset($_GET["firstname"]) ? $_GET["firstname"] : '';
$lastname = isset($_GET["lastname"]) ? $_GET["lastname"] : '';

$articles = [];

$sql = "SELECT * FROM movie 
        JOIN movie_genre ON movie_genre.id_movie = movie.id 
        JOIN genre ON genre.id = movie_genre.id_genre
        JOIN distributor ON movie.id_distributor = distributor.id
        WHERE 1";

if (!empty($genre)) {
    $sql .= " AND genre.id = '$genre'";

    $result = $db->query($sql);
}

if (!empty($titre)) {
    $sql .= " AND movie.title LIKE '%$titre%'";
    
    $result = $db->query($sql);
}

if (!empty($distrib)) {
    $sql .= " AND distributor.name LIKE '%$distrib%'";

    $result = $db->query($sql);
}

if (!empty($firstname) && !empty($lastname)){
    $sql = " SELECT * FROM user WHERE firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%'";
    ?><h1>User:</h1><?php
    foreach($db->query($sql) as $res){
        ?><article>
            <p><?= $res["firstname"] ." ".$res["lastname"]?></p>
        </article><?php  
    }
}

if (!empty($firstname) && empty($lastname)) {
    $sql = " SELECT * FROM user WHERE firstname LIKE '%$firstname%'";
    ?><h1>Firstname_User:</h1><?php
    foreach($db->query($sql) as $res){
        ?><article>
            <p><?= $res["firstname"] ?></p>
        </article><?php  
    }
}

if (!empty($lastname) && empty($firstname)) {
    $sql = " SELECT * FROM user WHERE lastname LIKE '%$lastname%'";
    ?><h1>Lastname_User:</h1><?php
    foreach($db->query($sql) as $res){
        ?><article>
            <p><?= $res["lastname"] ?></p>
        </article><?php  
    }
}

if ($result) {
    $articles = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($articles as $article){ ?>
        <article>
            <h1><?= $article["title"] ?></h1>
            <p>Distribué par <?= $article["name"] ?></p>
            <p>Créé par <?= $article["director"] ?></p>
            <p>Durée: <?= $article["duration"] ?>min</p>
        </article><?php
    }
}
?>
<script src="./script.js"></script>
</body>
</html>