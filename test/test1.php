<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "sql.php";?>
    <title>Document</title>
</head>
<body>

<?php

$filmParPage = 10;
$filmTotaleReq = $bdd->query("SELECT id FROM movie");
$filmTotale = $filmTotaleReq->rowCount();

if(isset($_GET['page']) AND !empty($_GET['page'])){
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
}else{
    $pageCourante = 1;
}

$depart = ($pageCourante - 1)*$filmParPage;

// $sql = "SELECT COUNT(*) AS nb_articles FROM movie";
// $requete2 = $db->query($sql);
// $articles = $requete2->fetch();
// $nbArticles = (int) $result['nb_articles'];
// echo $nbArticles;



function searchMovies($dsn, $title, $genre, $distributor) {
    $sql = "SELECT * FROM movie
            JOIN distributor ON movie.id_distributor = distributor.id
            WHERE (movie.title LIKE '%$title%' 
            OR distributor.name LIKE '%$title%')";

    if (!empty($genre)) {
        $sql .= " AND EXISTS (
                    SELECT 1 FROM movie_genre
                    JOIN genre ON movie_genre.id_genre = genre.id
                    WHERE movie_genre.id_movie = movie.id
                    AND genre.name LIKE '%$genre%')";
    }

    if (!empty($distributor)) {
        $sql .= " AND distributor.name LIKE '%$distributor%'";
    } 

    $result = $dsn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

$title = isset($_POST['title']) ? $_POST['title'] : '';
$genre = isset($_POST['genre']) ? $_POST['genre'] : '';
$distributor = isset($_POST['distributor']) ? $_POST['distributor'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $moviesByGenre = searchMovies($dsn, $title, $genre, $distributor);
}
?>

<h1>Cinéma</h1>

<h2>Rechercher des films</h2>
<form method="post" action="">
    <label for="title">Nom du film :</label>
    <input type="text" name="title" id="title" value="<?= $title ?>">

    <label for="genre">Genre :</label>
    <input type="text" name="genre" id="genre" value="<?= $genre ?>">

    <label for="distributor">Distributeur :</label>
    <input type="text" name="distributor" id="distributor" value="<?= $distributor ?>">

    <button type="submit">Rechercher</button>
</form>

<h2>Résultats de la recherche de films</h2>
<ul>
    <?php foreach ($moviesByGenre as $movie): ?>
        <li><?= $movie['title'] ?> - <?= $movie['genre'] ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
