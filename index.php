<?php
session_start();

        require ('./connexion.php');

        $sql = 'SELECT * FROM post_it';

        #On éxécute directement la requête
        $requete = $bdd->query($sql);

        #On récupère les donnée (fetch ou fetchAll)
        $datas = $requete->fetchAll();
?>



<!DOCTYPE html>
<html lang="fr">
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

    <main class="container-xl">

        <h1>memento <?php
            if (isset($_SESSION['user'])) {
                echo 'de '.$_SESSION['user']['name'];
            }
        ?></h1>
        <?php
            if (isset($_SESSION['user'])) {
                echo "<a href='./new_post-it.php' title='Ajouter un post-it' class='add-post-it'>Nouveau post it</a>";
            }
            else{
                echo "<a href='./login.php' title='Ajouter un post-it' class='add-post-it'>Nouveau post it</a>";
            }
        ?>
            
        <div class="content">
        
        <?php foreach($datas as $data): ?>
            <article>
            <p class="created"><?= $data['date'] ?></p>
            <a href="delete.php?id=<?php echo $data['id']?>" title="supprimer ce post-it" class="delete">
            <i class="fa-regular fa-circle-xmark"></i>
            </a>
            <div class="top-post-it">
                <h2><?=$data['title'] ?></h2>
            </div>
            <p class="description"><?php echo nl2br($data['content'])?></p>
            <p class="date">Créer le <?=$data['created_at'] ?></p>
        </article>
        <?php endforeach; ?>
        </div>
    </main>
</body>
</html>