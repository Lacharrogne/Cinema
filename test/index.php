<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <?php include "sql.php";?>
    <title>Document</title>
</head>
<body>
    
    <nav>
        <!-- <img src="./image/pathe.png" alt=""> -->
    </nav>
    <header>
        <form action="GET">
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
                <label for="action">Action</label>
                <input type="radio" id="action" name="genre" value="1"/>

                <label for="animation">Animation</label>
                <input type="radio" id="animation" name="genre" value="2"/>

                <label for="adventure">Adventure</label>
                <input type="radio" id="adventure" name="genre" value="3"/>

                <label for="drama">Drama</label>
                <input type="radio" id="drama" name="genre" value="4"/>
                
                <label for="comedy">Comedy</label>
                <input type="radio" id="comedy" name="genre" value="5"/>

                <label for="mystery">Mystery</label>
                <input type="radio" id="mystery" name="genre" value="6"/>

                <label for="biography">Biography</label>
                <input type="radio" id="biography" name="genre" value="7"/>

                <label for="crime">Crime</label>
                <input type="radio" id="crime" name="genre" value="8"/>

                <label for="fantasy">Fantasy</label>
                <input type="radio" id="fantasy" name="genre" value="9"/>

                <label for="horror">Horror</label>
                <input type="radio" id="Horror" name="genre" value="10"/>

                <label for="sci-fi">Sci-fi</label>
                <input type="radio" id="sci-fi" name="genre" value="11"/>

                <label for="romance">Romance</label>
                <input type="radio" id="romance" name="genre" value="12"/>

                <label for="family">Family</label>
                <input type="radio" id="family" name="genre" value="13"/>

                <label for="thriller">Thriller</label>
                <input type="radio" id="thriller" name="genre" value="14"/>
            </div>
            <br>
            <br>
            <button type="submit">envoyer</button>
        </form>
    </header>
    <main>
        <?php 
            $titre = $_GET["titre"];
            $genre = $_GET["genre"];
            $distrib = $_GET["distrib"];

            $sqlJoin = "SELECT * from movie 
                        join movie_genre on movie_genre.id_movie = movie.id 
                        join genre on genre.id = movie_genre.id_genre
                        join distributor on movie.id_distributor = distributor.id  
                        where genre.id = '$genre' 
                        and movie.title like '%$titre%'
                        and movie.id_distributor like '%$distrib%'";
                        
            $sqlTitre = "SELECT * FROM movie WHERE title LIKE '%$titre%'";
            $sqlDistrib = "SELECT * FROM distributor WHERE name LIKE '%$distrib%'";

            if ($genre == null){
                $requete2 = $db->query($sqlTitre);
                $articles = $requete2->fetchAll(PDO::FETCH_ASSOC);
            }elseif($genre == null && $titre == null){
                $requete3 = $db->query($sqlDistrib);
                $articles = $requete3->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $requete1 = $db->query($sqlJoin);
                $articles = $requete1->fetchAll(PDO::FETCH_ASSOC);
            }
        ?>
        <section>
            <?php foreach($articles as $article):?>
                <article>
                    <h1><?= $article["title"] ?></h1>
                    <p>Distribué par <?= $article["name"] ?></p>
                    <p>Créer par <?= $article["director"] ?></p>
                    <div>Durée: <?= $article["duration"] ?></div>
                </article>
            <?php endforeach?>
        </section>
    </main>
    <footer>

    </footer>
    <script src="./script.js"></script>
</body>
</html>