<?php
session_start();
require ('./connexion.php');
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
        <h1>memento</h1>
            <a href="./new_post-it.php" title="Ajouter un post-it" class="add-post-it">Nouveau post it</a>
        <div class="content">
        <article>
            <div class="top-post-it">
                <h2>titre du post-it</h2>
                <a href="/" title="supprimer ce post-it" class="delete">
                <i class="fa-regular fa-circle-xmark"></i>
                </a>

            </div>
            <ul class="todo">
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
            </ul>
            <p class="date">16/12/2023</p>
        </article>
        <article>
            <div class="top-post-it">
                <h2>titre du post-it</h2>
                <a href="/" title="supprimer ce post-it" class="delete">
                <i class="fa-regular fa-circle-xmark"></i>
                </a>

            </div>
            <ul class="todo">
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
            </ul>
            <p class="date">16/12/2023</p>
        </article>
        <article>
            <div class="top-post-it">
                <h2>titre du post-it</h2>
                <a href="/" title="supprimer ce post-it" class="delete">
                <i class="fa-regular fa-circle-xmark"></i>
                </a>

            </div>
            <ul class="todo">
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
            </ul>
            <p class="date">16/12/2023</p>
        </article>
        <article>
            <div class="top-post-it">
                <h2>titre du post-it</h2>
                <a href="/" title="supprimer ce post-it" class="delete">
                <i class="fa-regular fa-circle-xmark"></i>
                </a>

            </div>
            <ul class="todo">
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
            </ul>
            <p class="date">16/12/2023</p>
        </article>
        <article>
            <div class="top-post-it">
                <h2>titre du post-it</h2>
                <a href="/" title="supprimer ce post-it" class="delete">
                <i class="fa-regular fa-circle-xmark"></i>
                </a>

            </div>
            <ul class="todo">
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
            </ul>
            <p class="date">16/12/2023</p>
        </article>
        <article>
            <div class="top-post-it">
                <h2>titre du post-it</h2>
                <a href="/" title="supprimer ce post-it" class="delete">
                <i class="fa-regular fa-circle-xmark"></i>
                </a>

            </div>
            <ul class="todo">
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
            </ul>
            <p class="date">16/12/2023</p>
        </article>

        </div>
    </main>
</body>
</html>