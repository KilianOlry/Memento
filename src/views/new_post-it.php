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