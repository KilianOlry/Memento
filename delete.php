<?php

session_start();
if (!isset ($_SESSION['user'])) {
    header('Location: login.php');
}

require ('./connexion.php');
    $req = "DELETE FROM post_it WHERE id=:id";

    $insererRecette = $bdd->prepare($req);
    
    $insererRecette->execute([
        'id' => $_GET['id'],
       ]);

    header('Location: index.php')
?>