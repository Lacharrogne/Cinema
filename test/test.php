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
    <?php 
        $sql = "SELECT * FROM movie";
        $requete = $db->query($sql);
        $articles = $requete->fetchAll();
    ?>
    <nav>
        <!-- <img src="./image/pathe.png" alt=""> -->
    </nav>
    <header>
        
    </header>
    <main>
        <section>
            <?php foreach($articles as $article):?>
                <article>
                    <h1><?= $article["title"] ?></h1>
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