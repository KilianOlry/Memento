<?php

session_start();


    if (!isset ($_SESSION['user'])) {
        header('Location: login.php');
    }
        if (!empty($_POST)) {
            if (isset($_POST['title'], $_POST['content'], $_POST['date'])
                && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['date'])) {

                    
                $token = $_POST['token'];

                if (!$token || $token !== $_SESSION['token']) {
                    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
                    exit;
                }


                    $title = strip_tags($_POST['title']);
                    $content = strip_tags($_POST['content']);


                    $sql = "INSERT INTO post_it(title, content, date, user_id) VALUES(:title, :content, :date, :user_id)";

                    require ('./connexion.php');

                    $query = $bdd->prepare($sql);
            
                    $query->execute([
                        'title' => $title,
                        'content' => $content,
                        'date' => $_POST['date'],
                        'user_id' => $_SESSION['user']['id'],
                    ]);

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
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/817262485e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
        require ('./src/layout/header.php')
    ?>

    <main class="bg-form">
        <div class="wrapper container-xl">
        <form action="" method="post">
            <h1>Création du nouveau post it</h1>
            <div class="input-box">
                <input type="text" placeholder="Titre du post-it" name="title" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="date" placeholder="Votre email" name="date" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <textarea name="content" id="" cols="30" rows="10" placeholder="Votre message"></textarea>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
            <button type="submit" class="btn">Créer</button>
        </form>
    </div>

    </main>
</body>
</html>