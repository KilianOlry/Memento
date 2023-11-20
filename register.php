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
    <link rel="stylesheet" href="./src/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/817262485e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <?php
    require('./src/layout/header.php')
    ?>

    <main class="bg-form">
        <div class="wrapper container-xl">
        <form action="" method="post">
            <h1>S'inscrire</h1>
            <div class="input-box">
                <input type="text" placeholder="Votre nom" name="name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Votre email" name="email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Mot de passe" name="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">S'inscrire</button>
        </form>
    </div>

    </main>
</body>

</html>