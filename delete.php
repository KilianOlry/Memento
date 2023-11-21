<?php

session_start();
if (!isset ($_SESSION['user'])) {
    header('Location: login.php');
}

require ('./connexion.php');
    $sql = "DELETE FROM post_it WHERE id=:id";

    $query = $bdd->prepare($sql);
    
    $query->execute([
        'id' => $_GET['id'],
       ]);

    header('Location: index.php')
?>