<?php

    // stock les ID user dans des constantes
    define("DBHOST", "localhost");
    define("DBUSER", "lacharrogne");
    define("DBPASS", "Asce0610");
    define("DBNAME", "cinema");

    $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

    // connection à mysql
    try{
        $db = new PDO($dsn, DBUSER, DBPASS);

        // echo "c'est bon";

    }catch(PDOException $e){
        die($e -> getMessage());
    };


// $servername = "localhost";
// $username = "lacharrogne";
// $password = "Asce0610";
// $dbname = "cinema";

// $dsn = new mysqli($servername, $username, $password, $dbname);

// if ($dsn->connect_error) {
//     die("Connection failed: " . $dsn->connect_error);
// }
?>