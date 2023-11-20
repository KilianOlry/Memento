<?php
    if (!empty($_POST)) {
        if (isset($_POST['email'], $_POST['password'])
            && !empty($_POST['email']) && !empty($_POST['password'])) {

                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    die("email incorrect");
                }

                require ('./connexion.php');
                $sql = 'SELECT * FROM user WHERE email = :email';
                $query =$bdd->prepare($sql);     
                $query->execute([
                    'email' => $_POST['email'],
                ]);
                $user = $query->fetch();

                if(!$user){
                    echo "l'utilisateur n'existe pas user";
                }
                if(!password_verify($_POST['password'], $user['password'])){
                    echo 'le mot de passe ne correspond pas';
                }

                session_start();

                $_SESSION['user'] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                ];

                header('Location: profil.php');
                
                
        }else{
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
    <title>Document</title>
</head>

<body>

    <?php
    require('./src/layout/header.php')
    ?>

    <main class="container-xl">
        <h1>Connexion</h1>

        <form action="" method="post">
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