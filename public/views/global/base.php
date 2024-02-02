<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Application création de post-it">
    <link rel="stylesheet" href="./public/assets/css/styles.css">
    <link rel="shortcut icon" href="https://notion-emojis.s3-us-west-2.amazonaws.com/prod/svg-twitter/1f9e0.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/817262485e.js" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- CDN CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />
    <!-- CDN TOASTR -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Kilian.O || Memento</title>
</head>

<body>

    <?php
    require('./public/views/global/header.php')
    ?>

    <main class="<?php $route === ('login' || 'register' || 'new_post-it') ? '' : 'container-xl'; ?>">

        <?php
        require './src/controller/' . $route . '_controller.php';
        ?>

    </main>
    <script src="./public/assets/js/script.js"></script>

    <script>
        <?php if (!empty($_SESSION['status'])) { ?>
            toastr.<?= $_SESSION['status'] ?>("<?= $_SESSION['message'] ?>")
        <?php }
        unset($_SESSION['status']);
        ?>
    </script>
</body>

</html>