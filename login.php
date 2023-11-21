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
                $_SESSION['token'] = md5(uniqid(mt_rand(), true));


                header('Location: index.php');
                
                
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

    <main class="bg-form">
        <div class="wrapper container-xl">
        <form action="" method="post">
            <h1>Connexion</h1>
            <div class="input-box">
                <input type="text" placeholder="Votre email" name="email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="password" name="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Connexion</button>
        </form>
        
    </div>

    </main>
</body>
</html>