
<?php
session_start();
    if(!isset($_SESSION['user'])){
        header('Location: register.php');
        exit;
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
        require ('./src/layout/header.php')
    ?>
<h1>Bonjour<?php echo $_SESSION['user']['name'] ?><h1>
</body>
</html>