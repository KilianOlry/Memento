<?php

session_start();
if (!empty($_POST)) {
    if (
        isset($_POST['name'], $_POST['email'], $_POST['password'])
        && !empty($_POST['name'] && !empty($_POST['email']) && !empty($_POST['password']))
    ) {

        $pseudo = strip_tags($_POST['name']);

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            die("email incorrect");
        }

        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $sql = "INSERT INTO user(name, email, password) VALUES(:pseudo,  :email, :password)";

        require ('./connexion.php');
        $query = $bdd->prepare($sql);

        $query->execute([
            'pseudo' => $pseudo,
            'email' => $_POST['email'],
            'password' => $pass,
        ]);

        $_SESSION['user'] = [
        'name' => $pseudo,
        'email' => $_POST['email'],
       ];

       header('Location: profil.php');
    } else {

        die('le formulaire est incomplet');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/assets/css/new_post-it.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/817262485e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <?php
    require('./src/layout/header.php')
    ?>

    <main class="container-xl">
        <h1>Inscription</h1>


        <form action="" method="post">
            <div class="content">
                <label for="name">Nom</label>
                <input type="text" name="name" placeholder="Votre nom" id="name">
            </div>
            <div class="content">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Votre email" id="email">
            </div>
            <div class="content">
                <label for="password">Mot de passe</label>
                <input type="text" name="password" placeholder="Votre password" id="password">
            </div>
            <button type="submit">Valider</button>
        </form>

    </main>
</body>

</html>