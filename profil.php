
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
    <title>Document</title>
</head>
<body>
<h1>Bonjour<?php echo $_SESSION['user']['name'] ?><h1>
</body>
</html>