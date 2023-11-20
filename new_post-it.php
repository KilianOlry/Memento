<?php
    
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
        require ('./src/layout/header.php')
    ?>

    <main class="container-xl">
        <h1>Creation post it</h1>
    <form action="#" method="post">
            <div class="content">
                <label for="title" class="">Titre du post it</label>
                <input type="text" id="title" name="title"
                    class=""
                    placeholder="Nom du post it" required>
            </div>
            <div class="content">
                <label for="subject" class=""></label>
                <input type="text" id="subject"
                    class=""
                    placeholder="Objet du message" required>
            </div>
            <div class="content">
                <label for="message" class="block mb-2 text-sm font-medium text-green dark:text-gray-400">Votre
                    message</label>
                <textarea id="message" rows="6"
                    class=""
                    placeholder="Écrivez votre message"></textarea>
            </div>
            <button type="submit" class="">Valider</button>
        </form>
    </main>
</body>
</html>